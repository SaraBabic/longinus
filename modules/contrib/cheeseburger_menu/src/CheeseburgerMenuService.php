<?php

namespace Drupal\cheeseburger_menu;

use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Language\LanguageInterface;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Menu\MenuActiveTrailInterface;
use Drupal\Core\Menu\MenuLinkTreeInterface;
use Drupal\Core\Menu\MenuTreeParameters;
use Drupal\Core\Routing\CurrentRouteMatch;
use Drupal\Core\StringTranslation\StringTranslationTrait;
use Drupal\taxonomy\TermInterface;

/**
 * Base service providing functions.
 */
class CheeseburgerMenuService {

  use StringTranslationTrait;

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Drupal\Core\Menu\MenuLinkTreeInterface definition.
   *
   * @var \Drupal\Core\Menu\MenuLinkTreeInterface
   */
  protected $menuLinkTree;

  /**
   * The active menu trail service.
   *
   * @var \Drupal\Core\Menu\MenuActiveTrailInterface
   */
  protected $menuActiveTrail;

  /**
   * Current route match service.
   *
   * @var \Drupal\Core\Routing\CurrentRouteMatch
   */
  protected $currentRouteMatch;

  /**
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Constructs a new CheeseburgerMenuService object.
   */
  public function __construct(EntityTypeManagerInterface $entity_type_manager, MenuLinkTreeInterface $menu_link_tree, MenuActiveTrailInterface $menu_active_trail, CurrentRouteMatch $current_route_match, LanguageManagerInterface $language_manager, ModuleHandlerInterface $module_handler) {
    $this->entityTypeManager = $entity_type_manager;
    $this->menuLinkTree = $menu_link_tree;
    $this->menuActiveTrail = $menu_active_trail;
    $this->currentRouteMatch = $current_route_match;
    $this->languageManager = $language_manager;
    $this->moduleHandler = $module_handler;
  }

  /**
   * Returns sortable menu rows for cheeseburger config form.
   *
   * @param array $default_value
   *   Cheeseburger menu configuration.
   *
   * @return array
   *   Sortable menu rows for cheeseburger config form.
   */
  public function getMenusAsRows(array $default_value = []) {
    $rows = [];
    if ($this->entityTypeManager->hasDefinition('menu')) {
      foreach ($this->entityTypeManager->getStorage('menu')->loadMultiple() as $id => $entity) {
        $rows[$id] = $this->buildRowFromEntity($entity, isset($default_value[$id]) ? $default_value[$id] : []);
      }
    }
    if ($this->entityTypeManager->hasDefinition('taxonomy_vocabulary')) {
      foreach ($this->entityTypeManager->getStorage('taxonomy_vocabulary')->loadMultiple() as $id => $entity) {
        $rows[$id] = $this->buildRowFromEntity($entity, isset($default_value[$id]) ? $default_value[$id] : []);
      }
    }
    $rows['enabled_region'] = $this->buildRegionRow($this->t('Enabled'), 'enabled');
    $rows['hidden_region'] = $this->buildRegionRow($this->t('Hidden'), 'hidden');
    uasort($rows, function ($menu1, $menu2) use ($default_value) {
      if ($menu2['#menu_id'] === 'enabled') {
        return 1;
      }
      if ($menu1['#menu_id'] === 'enabled') {
        return -1;
      }
      if ($menu2['#menu_id'] === 'hidden') {
        return isset($default_value[$menu1['#menu_id']]) ? -1 : 1;
      }
      if ($menu1['#menu_id'] === 'hidden') {
        return isset($default_value[$menu2['#menu_id']]) ? 1 : -1;
      }
      return $menu1['#weight'] <=> $menu2['#weight'];
    });
    return $rows;
  }

  /**
   * Builds sortable entity row for cheeseburger config form.
   *
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   Entity to build.
   * @param array $default_value
   *   Cheeseburger config for entity.
   *
   * @return array
   *   Sortable entity row.
   */
  public function buildRowFromEntity(EntityInterface $entity, array $default_value = []) {
    $row = [];
    $row['label'] = ['#markup' => $entity->label()];
    // Override default values to markup elements.
    $row['#attributes']['class'][] = 'draggable';
    $row['#weight'] = $default_value['weight'] ?? 100;
    // Add weight column.
    $row['weight'] = [
      '#type' => 'weight',
      '#title' => $this->t('Weight for @title', ['@title' => $entity->label()]),
      '#title_display' => 'invisible',
      '#default_value' => $default_value['weight'] ?? 100,
      '#attributes' => ['class' => ['weight']],
    ];
    $row['weight']['#delta'] = 100;
    $row['menu_type'] = [
      '#type' => 'item',
      '#markup' => $entity->getEntityType()->getLabel(),
      '#value' => $entity->getEntityTypeId(),
    ];
    $row['settings'] = [
      '#type' => 'details',
      '#title' => $this->t('Settings'),
      '#tree' => TRUE,
    ];
    $settings_form = &$row['settings'];
    $settings = $default_value['settings'] ?? [];
    $settings_form['show_links_in_navigation'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show links in navigation(only first level)'),
      '#default_value' => $settings['show_links_in_navigation'] ?? 0,
    ];
    $settings_form['max_depth'] = [
      '#type' => 'number',
      '#title' => $this->t('Maximum menu depth. Use 0 for no limit.'),
      '#default_value' => $settings['max_depth'] ?? 0,
      '#states' => [
        'visible' => [
          'input[name="settings[menus][' . $entity->id() . '][settings][show_links_in_navigation]"]' => ['checked' => FALSE],
        ],
      ],
    ];
    $settings_form['initial_visibility_level'] = [
      '#type' => 'number',
      '#title' => $this->t('Initial visibility level'),
      '#default_value' => $settings['initial_visibility_level'] ?? 1,
      '#access' => $entity->getEntityTypeId() !== 'taxonomy_vocabulary',
    ];
    $settings_form['default_expanded'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Expanded by default (menu items)'),
      '#default_value' => $settings['default_expanded'] ?? FALSE,
      '#states' => [
        'visible' => [
          'input[name="settings[menus][' . $entity->id() . '][settings][show_links_in_navigation]"]' => ['checked' => FALSE],
        ],
      ],
    ];
    $settings_form['show_title_in_navigation'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show title in navigation'),
      '#default_value' => $settings['show_title_in_navigation'] ?? 1,
    ];
    $settings_form['show_title_above_menu'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show title above menu'),
      '#default_value' => $settings['show_title_above_menu'] ?? 1,
    ];

    $settings_form['collapsible_title'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Make title collapsible'),
      '#default_value' => $settings['collapsible_title'] ?? 0,
      '#states' => [
        'visible' => [
          'input[name="settings[menus][' . $entity->id() . '][settings][show_title_above_menu]"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $settings_form['title_default_expanded'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Title expanded by default'),
      '#default_value' => $settings['title_default_expanded'] ?? 1,
      '#states' => [
        'visible' => [
          'input[name="settings[menus][' . $entity->id() . '][settings][show_title_above_menu]"]' => ['checked' => TRUE],
          'input[name="settings[menus][' . $entity->id() . '][settings][collapsible_title]"]' => ['checked' => TRUE],
        ],
      ],
    ];

    $settings_form['override_title'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use overriden title'),
      '#default_value' => $settings['override_title'] ?? 0,
    ];
    $settings_form['title_override'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Title override'),
      '#states' => [
        'visible' => [
          'input[name="settings[menus][' . $entity->id() . '][settings][override_title]"]' => ['checked' => TRUE],
        ],
      ],
      '#size' => 20,
      '#default_value' => $settings['title_override'] ?? NULL,
    ];
    $settings_form['icon'] = [
      '#type' => 'managed_file',
      '#title' => $this->t('Menu icon'),
      '#upload_validators' => [
        'file_validate_extensions' => ['svg'],
      ],
      '#description' => (isset($settings['icon']) && !empty($settings['icon'])) ? $this->t('Icon is uploaded, you can overwrite it') : NULL,
    ];
    $row['#menu_id'] = $entity->id();
    return $row;
  }

  /**
   * Builds region row.
   *
   * @param string|\Drupal\Core\StringTranslation\TranslatableMarkup $title
   *   Region title.
   * @param string $region_name
   *   Region machine name.
   *
   * @return array
   *   Region row.
   */
  public function buildRegionRow($title, $region_name) {
    $color = $region_name === 'enabled' ? 'ccfcca' : 'f0a19c';
    $row = [
      '#attributes' => [
        'style' => "background-color: #$color",
      ],
    ];
    $row['label'] = ['#markup' => '<b>' . $title . '</b>'];
    $row['weight'] = [
      '#type' => 'hidden',
      '#attributes' => ['class' => ['weight']],
    ];
    $row['menu_type'] = [
      '#type' => 'hidden',
      '#value' => $region_name,
      '#wrapper_attributes' => [
        'colspan' => 2,
      ],
    ];
    $row['#menu_id'] = $region_name;
    return $row;
  }

  /**
   * Returns cheeseburger menu from menu.
   *
   * @param array $menu_settings
   *   The menu settings.
   * @param bool $parent_menu_as_link
   *   Whether parent menu item should be links or not.
   *
   * @return \Drupal\cheeseburger_menu\CheeseburgerMenu
   *   Built cheeseburger menu.
   */
  public function buildMenu(array $menu_settings, $parent_menu_as_link = FALSE, $track_active_trail = TRUE) {
    $menu_tree_parameters = new MenuTreeParameters();
    $menu_tree_parameters->onlyEnabledLinks();
    $max_depth = $menu_settings['settings']['max_depth'];
    $initial_visibility_level = $menu_settings['settings']['initial_visibility_level'] ?? 1;
    if ($track_active_trail) {
      $active_trail = $this->menuActiveTrail->getActiveTrailIds($menu_settings['id']);
      $menu_tree_parameters->setActiveTrail($active_trail);
    }
    $menu_tree_parameters->setMinDepth($initial_visibility_level);
    if (!is_null($max_depth) && is_numeric($max_depth) && $max_depth > 0) {
      $menu_tree_parameters->setMaxDepth($initial_visibility_level + $max_depth - 1);
    }
    if ($initial_visibility_level > 1) {

    }
    $menu_link_tree = $this->menuLinkTree->load($menu_settings['id'], $menu_tree_parameters);
    $manipulators = [
      [
        'callable' => 'menu.default_tree_manipulators:checkAccess',
      ],
      [
        'callable' => 'menu.default_tree_manipulators:generateIndexAndSort',
      ],
    ];
    if ($menu_settings['id'] === 'language') {
      $manipulators = [
        [
          'callable' => 'menu.default_tree_manipulators:generateIndexAndSort',
        ],
      ];
    }
    $this->moduleHandler->alter('cheeseburger_menu_tree_manipulators', $manipulators, $menu_link_tree);
    $menu_link_tree = $this->menuLinkTree->transform($menu_link_tree, $manipulators);
    $menu = $this->entityTypeManager->getStorage('menu')->load($menu_settings['id']);
    $cheeseburger_menu = CheeseburgerMenu::createFromSettings($menu_settings, $menu);
    $menu_item_settings = [
      'parent_as_link' => $parent_menu_as_link,
      'expanded' => $menu_settings['settings']['default_expanded'],
    ];
    foreach ($menu_link_tree as $menu_link_tree_element) {
      if ((!($menu_link_tree_element->access instanceof AccessResultInterface) || $menu_link_tree_element->access->isAllowed()) && $menu_link_tree_element->link->isEnabled()) {
        if ($menu_settings['settings']['show_links_in_navigation']) {
          $cheeseburger_menu->addNavigationMenuItem(CheeseburgerMenuItem::createFromMenuLinkTreeElement($menu_link_tree_element, $menu_item_settings));
        }
        else {
          $cheeseburger_menu->addMenuItem(CheeseburgerMenuItem::createFromMenuLinkTreeElement($menu_link_tree_element, $menu_item_settings));
        }
      }
    }
    return $cheeseburger_menu;
  }

  /**
   * Returns cheeseburger menu from taxonomy vocabulary.
   *
   * @param array $vocabulary_menu_settings
   *   The menu settings.
   * @param bool $parent_menu_as_link
   *   Whether parent menu item should be links or not.
   *
   * @return \Drupal\cheeseburger_menu\CheeseburgerMenu
   *   Built cheeseburger menu.
   */
  public function buildMenuFromVocabulary(array $vocabulary_menu_settings, $parent_menu_as_link = FALSE, $track_active_trail = TRUE) {
    /** @var \Drupal\taxonomy\TermStorage $term_storage */
    $term_storage = $this->entityTypeManager->getStorage('taxonomy_term');
    /** @var \Drupal\taxonomy\Entity\Vocabulary $vocabulary */
    $vocabulary = $this->entityTypeManager->getStorage('taxonomy_vocabulary')->load($vocabulary_menu_settings['id']);

    // @todo Optimize this.
    $active_trail = [];
    if ($track_active_trail)  {
      $route_parameters = $this->currentRouteMatch->getParameters();
      if ($route_parameters->has('taxonomy_term')) {
        $current_taxonomy_term = $route_parameters->get('taxonomy_term');
        $current_taxonomy_term_id = FALSE;
        if (is_numeric($current_taxonomy_term)) {
          $current_taxonomy_term_id = $current_taxonomy_term;
        }
        elseif ($current_taxonomy_term instanceof TermInterface) {
          $current_taxonomy_term_id = $current_taxonomy_term->id();
        }
        if ($current_taxonomy_term_id) {
          $parents = $term_storage->loadAllParents($current_taxonomy_term_id);
          $active_trail = array_combine(array_keys($parents), array_keys($parents));
        }
      }
    }

    // @todo Test load tree without max depth vs get children.
    $top_tree_taxonomy_terms = $term_storage->loadTree($vocabulary_menu_settings['id'], 0, 1, TRUE);
    $cheeseburger_menu = CheeseburgerMenu::createFromSettings($vocabulary_menu_settings, $vocabulary);
    $max_depth = $vocabulary_menu_settings['settings']['max_depth'];
    $menu_item_settings = [
      'parent_as_link' => $parent_menu_as_link,
      'active_trail' => $active_trail,
      'expanded' => $vocabulary_menu_settings['settings']['default_expanded'],
    ];
    $langcode = $this->languageManager
      ->getCurrentLanguage(LanguageInterface::TYPE_CONTENT)
      ->getId();
    foreach ($top_tree_taxonomy_terms as $taxonomy_term) {
      if ($taxonomy_term->access('view')) {
        if ($vocabulary_menu_settings['settings']['show_links_in_navigation']) {
          $cheeseburger_menu->addNavigationMenuItem(CheeseburgerMenuItem::createFromTaxonomyVocabulary($taxonomy_term, $menu_item_settings, $max_depth, 1, $langcode));
        }
        else {
          $cheeseburger_menu->addMenuItem(CheeseburgerMenuItem::createFromTaxonomyVocabulary($taxonomy_term, $menu_item_settings, $max_depth, 1, $langcode));
        }
      }
    }
    return $cheeseburger_menu;
  }

}
