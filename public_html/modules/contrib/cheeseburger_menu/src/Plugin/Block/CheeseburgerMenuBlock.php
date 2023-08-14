<?php

namespace Drupal\cheeseburger_menu\Plugin\Block;

use Drupal\cheeseburger_menu\CheeseburgerMenuService;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'CheeseburgerMenu' block.
 *
 * @Block(
 *  id = "cheeseburger_menu",
 *  admin_label = @Translation("Cheeseburger menu"),
 *  category = @Translation("Menus"),
 * )
 */
class CheeseburgerMenuBlock extends BlockBase implements ContainerFactoryPluginInterface {


  /**
   * Cheeseburger menu service.
   *
   * @var \Drupal\cheeseburger_menu\CheeseburgerMenuService
   */
  protected $service;

  /**
   * Module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * CheeseburgerMenu constructor.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, CheeseburgerMenuService $cheeseburger_menu_service, ModuleHandlerInterface $module_handler, EntityTypeManagerInterface $entity_type_manager) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->service = $cheeseburger_menu_service;
    $this->moduleHandler = $module_handler;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('cheeseburger_menu.service'),
      $container->get('module_handler'),
      $container->get('entity_type.manager')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function defaultConfiguration() {
    $default_settings = [
      'default_css' => TRUE,
      'default_js' => TRUE,
      'show_navigation' => TRUE,
      'parent_menu_as_link' => FALSE,
      'hidden' => TRUE,
      'invoke_hooks' => FALSE,
      'track_active_trail' => TRUE,
      'left_side_background_color' => '#2494DB',
      'left_side_text_color' => '#ffffff',
      'right_side_background_color' => '#ffffff',
      'right_side_text_color' => '#000000',
      'trigger_color' => '#0723b0',
      'trigger_background_color' => '#43def9',
      'scrollbar_color' => '#b4f5fd',
      'menus' => [],
    ];
    $default_settings += array_fill_keys([
      'left_side_background_opacity',
      'left_side_text_opacity',
      'right_side_background_opacity',
      'right_side_text_opacity',
      'trigger_opacity',
      'trigger_background_opacity',
      'scrollbar_opacity',
    ], '1');
    return $default_settings + parent::defaultConfiguration();
  }

  /**
   * Returns config value.
   *
   * @param string $key
   *   Config name.
   * @param mixed $default_value
   *   Default value that will be returned if config is not set.
   *
   * @return mixed
   *   Config value.
   */
  public function getConfigValue($key, $default_value = NULL) {
    if (isset($this->configuration[$key])) {
      return $this->configuration[$key];
    }
    return $default_value;
  }

  /**
   * {@inheritDoc}
   */
  public function calculateDependencies() {
    $dependencies = [];
    foreach ($this->getConfigValue('menus', []) as $menu) {
      $menu_entity = $this->entityTypeManager->getStorage($menu['menu_type'])->load($menu['id']);
      $dependencies['config'][] = $menu_entity->getConfigDependencyName();
    }
    return array_merge($dependencies, parent::calculateDependencies());
  }

  /**
   * Currently unused.
   *
   * @param array $dependencies
   *   Dependencies that will be removed.
   *
   * @see https://www.drupal.org/project/drupal/issues/3193344
   *   Issue that will never be fixed obviously.
   *
   * @return bool
   *   Does
   */
  public function onDependencyRemoval(array $dependencies) {
    $menus = $this->getConfigValue('menus');
    foreach ($dependencies['config'] as $dependency) {
      foreach ($menus as $menu_id => $menu) {
        if ($dependency->getEntityTypeId() === $menu['menu_type'] && $dependency->id() === $menu['id']) {
          unset($menus[$menu_id]);
        }
      }
    }
    $this->setConfigurationValue('menus', $menus);
    return TRUE;
  }

  /**
   * {@inheritDoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $form['default_css'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use default css'),
      '#description' => $this->t('Use default css provided by cheeseburger menu module'),
      '#default_value' => $this->getConfigValue('default_css'),
    ];
    $form['default_js'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Use default js'),
      '#description' => $this->t('Use default js provided by cheeseburger menu module'),
      '#default_value' => $this->getConfigValue('default_js'),
    ];
    $form['hidden'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Hidden by default'),
      '#default_value' => $this->getConfigValue('hidden'),
      '#access' => FALSE,
    ];
    $form['parent_menu_as_link'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show parent menu item as link'),
      '#default_value' => $this->getConfigValue('parent_menu_as_link'),
    ];
    $form['show_navigation'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Show navigation'),
      '#default_value' => $this->getConfigValue('show_navigation'),
    ];
    $form['invoke_hooks'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Invoke hooks'),
      '#description' => $this->t('If you are not using advantage of alter hooks, disable this for performance reasons. For more info about hooks see cheeseburger_menu.api.php file'),
      '#default_value' => $this->getConfigValue('invoke_hooks'),
    ];
    $form['track_active_trail'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Highlight active menu item'),
      '#description' => $this->t('If this feature is not important to you it should be disabled, this will lower number of cached definitions'),
      '#default_value' => $this->getConfigValue('track_active_trail'),
    ];
    $form['menus'] = [
      '#type' => 'table',
      '#header' => [
        'label' => $this->t('Label'),
        'weight' => $this->t('Weight'),
        'menu_type' => $this->t('Menu type'),
        'settings' => $this->t('Settings'),
      ],
      '#empty' => $this->t('There are no menus yet.'),
      '#tabledrag' => [
        [
          'action' => 'order',
          'relationship' => 'sibling',
          'group' => 'weight',
        ],
      ],
    ] + $this->service->getMenusAsRows($this->getConfigValue('menus', []));
    $form['colors'] = [
      '#type' => 'table',
      '#header' => [
        'left_side_background' => $this->t('Left side background'),
        'left_side_text' => $this->t('Left side text'),
        'right_side_background' => $this->t('Right side background'),
        'right_side_text' => $this->t('Right side text'),
        'trigger' => $this->t('Trigger'),
        'trigger_background' => $this->t('Trigger background'),
        'scrollbar' => $this->t('Scrollbar'),
      ],
    ];
    // Colors.
    $form['colors']['row'] = [];
    $row = &$form['colors']['row'];
    $row['left_side_background']['left_side_background_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Left side background color'),
      '#default_value' => strtoupper($this->getConfigValue('left_side_background_color')),
    ];
    $row['left_side_background']['left_side_background_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Left side background opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('left_side_background_opacity'),
    ];
    $row['left_side_text']['left_side_text_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Left side text color'),
      '#default_value' => strtoupper($this->getConfigValue('left_side_text_color')),
    ];
    $row['left_side_text']['left_side_text_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Left side text opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('left_side_text_opacity'),
    ];
    $row['right_side_background']['right_side_background_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Right side background color'),
      '#default_value' => strtoupper($this->getConfigValue('right_side_background_color')),
    ];
    $row['right_side_background']['right_side_background_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Right side background opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('right_side_background_opacity'),
    ];

    $row['right_side_text']['right_side_text_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Right side text color'),
      '#default_value' => strtoupper($this->getConfigValue('right_side_text_color')),
    ];
    $row['right_side_text']['right_side_text_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Right side text opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('right_side_text_opacity'),
    ];

    $row['trigger']['trigger_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Trigger color'),
      '#default_value' => strtoupper($this->getConfigValue('trigger_color')),
    ];
    $row['trigger']['trigger_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Trigger opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('trigger_opacity'),
    ];
    $row['trigger_background']['trigger_background_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Trigger background color'),
      '#default_value' => strtoupper($this->getConfigValue('trigger_background_color')),
    ];
    $row['trigger_background']['trigger_background_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Trigger background  opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('trigger_background_opacity'),
    ];
    $row['scrollbar']['scrollbar_color'] = [
      '#type' => 'color',
      '#title' => $this->t('Scrollbar color'),
      '#default_value' => strtoupper($this->getConfigValue('scrollbar_color')),
    ];
    $row['scrollbar']['scrollbar_opacity'] = [
      '#type' => 'number',
      '#title' => $this->t('Scrollbar  opacity'),
      '#max' => 1,
      '#min' => 0,
      '#step' => 0.1,
      '#default_value' => $this->getConfigValue('scrollbar_opacity'),
    ];
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    // Single config.
    $this->setConfigurationValue('default_css', $form_state->getValue('default_css'));
    $this->setConfigurationValue('default_js', $form_state->getValue('default_js'));
    $this->setConfigurationValue('hidden', $form_state->getValue('hidden'));
    $this->setConfigurationValue('parent_menu_as_link', $form_state->getValue('parent_menu_as_link'));
    $this->setConfigurationValue('show_navigation', $form_state->getValue('show_navigation'));
    $this->setConfigurationValue('invoke_hooks', $form_state->getValue('invoke_hooks'));
    $this->setConfigurationValue('track_active_trail', $form_state->getValue('track_active_trail'));
    foreach($form_state->getValue(['colors', 'row']) as $color_settings_values) {
      foreach ($color_settings_values as $color_setting_name => $color_setting_value) {
        $this->setConfigurationValue($color_setting_name, $color_setting_value);
      }
    }
    // Config group.
    $menus = [];
    foreach ($form_state->getValue('menus') as $key => $menu) {
      if ($menu['menu_type'] === 'enabled') {
        continue;
      }
      if ($menu['menu_type'] === 'hidden') {
        break;
      }
      if (!empty($menu['settings']['show_links_in_navigation'])) {
        $menu['settings']['max_depth'] = 1;
        $menu['settings']['default_expanded'] = FALSE;
      }
      // Setting icon.
      $icon_setting = &$menu['settings']['icon'];
      if (isset($icon_setting[0])) {
        /** @var \Drupal\file\Entity\File $file */
        $file = $this->entityTypeManager->getStorage('file')->load($icon_setting[0]);
        $icon_setting = file_get_contents($file->getFileUri());
      }
      else {
        $menu_settings = $this->getConfigValue('menus', []);
        $icon_setting = $menu_settings[$key]['settings']['icon'] ?? '';
      }
      $menus[$key] = $menu;
    }
    uasort($menus, function ($menu1, $menu2) {
      return $menu1['weight'] <=> $menu2['weight'];
    });
    foreach ($menus as $key => &$menu) {
      $menu['id'] = $key;
    }
    $this->setConfigurationValue('menus', $menus);
    parent::submitConfigurationForm($form, $form_state);
  }

  /**
   * Invokes all hooks provided by cheeseburger_menu module.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenu[] $menus
   *   Menus to invoke hooks on.
   */
  public function createHooks(array $menus) {
    foreach ($menus as &$menu) {
      $this->createMenuItemHooks($menu->getMenuItems());
      $this->moduleHandler->alter('cheeseburger_menu', $menu);
    }
  }

  /**
   * Invokes hooks on given menu items and its children.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem[] $menu_items
   *   Menu items to invoke hooks on.
   */
  public function createMenuItemHooks(array $menu_items) {
    foreach ($menu_items as $menu_item) {
      if ($menu_item->hasChild()) {
        $this->createMenuItemHooks($menu_item->getChildren());
      }
      $this->moduleHandler->alter('cheeseburger_menu_item', $menu_item);
    }
  }

  /**
   * {@inheritDoc}
   */
  public function build() {
    $menus = [];
    foreach ($this->getConfigValue('menus') as $menu) {
      switch ($menu['menu_type']) {
        case 'taxonomy_vocabulary':
          $menus[$menu['id']] = $this->service->buildMenuFromVocabulary($menu, $this->getConfigValue('parent_menu_as_link'), $this->getConfigValue('track_active_trail'));
          break;

        case 'menu':
          $menus[$menu['id']] = $this->service->buildMenu($menu, $this->getConfigValue('parent_menu_as_link'), $this->getConfigValue('track_active_trail'));
          break;
      }
    }
    if ($this->getConfigValue('invoke_hooks')) {
      $this->createHooks($menus);
    }
    $cache_contexts = [];
    foreach ($menus as $menu) {
      $cache_contexts = Cache::mergeContexts($cache_contexts, $menu->getCacheContexts());
    }
    $build = [
      '#theme' => 'cheeseburger_menu',
      '#tree' => $menus,
      '#show_navigation' => $this->getConfigValue('show_navigation'),
      '#cache' => [
        'contexts' => $cache_contexts
      ]
    ];
    if ($this->getConfigValue('default_css')) {
      $build['#attached']['library'][] = 'cheeseburger_menu/cheeseburger_menu.css';
    }
    if ($this->getConfigValue('default_js')) {
      $build['#attached']['library'][] = 'cheeseburger_menu/cheeseburger_menu.js';
    }
    return $build;
  }

  /**
   * {@inheritDoc}
   */
  public function getCacheTags() {
    $cache_tags = [];
    foreach ($this->configuration['menus'] as $menu) {
      $cache_tags[] = 'cheeseburger_' . $menu['menu_type'] . ':' . $menu['id'];
      if ($menu['menu_type'] === 'menu') {
        $cache_tags[] = 'config:system.menu.' . $menu['id'];
      }
      elseif ($menu['menu_type'] === 'taxonomy_vocabulary') {
        $cache_tags[] = 'taxonomy_term_list:' . $menu['id'];
      }
    }
    return Cache::mergeTags($cache_tags, parent::getCacheTags());
  }

  /**
   * {@inheritDoc}
   */
  public function getCacheContexts() {
    $cache_contexts = [];
    if ($this->getConfigValue('track_active_trail')) {
      foreach ($this->configuration['menus'] as $menu) {
        if ($menu['menu_type'] === 'menu') {
          $cache_contexts[] ='route.menu_active_trails:' . $menu['id'];
        }
        elseif ($menu['menu_type'] === 'taxonomy_vocabulary') {
          $cache_contexts[] = 'route.taxonomy_term_tree:' . $menu['id'];
        }
      }
    }
    return Cache::mergeContexts($cache_contexts, parent::getCacheContexts());
  }

}
