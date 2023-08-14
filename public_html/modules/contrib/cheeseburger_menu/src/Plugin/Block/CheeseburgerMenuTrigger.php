<?php

namespace Drupal\cheeseburger_menu\Plugin\Block;

use Drupal\breakpoint\BreakpointManagerInterface;
use Drupal\Core\Block\BlockBase;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Theme\ThemeManagerInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a 'CheeseburgerMenu' block.
 *
 * @Block(
 *  id = "cheeseburger_menu_trigger",
 *  admin_label = @Translation("Cheeseburger menu trigger")
 * )
 */
class CheeseburgerMenuTrigger extends BlockBase implements ContainerFactoryPluginInterface {

  /**
   * Entity type manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Config factory.
   *
   * @var \Drupal\Core\Config\ConfigFactoryInterface
   */
  protected $configFactory;

  /**
   * Breakpoint manager.
   *
   * @var \Drupal\breakpoint\BreakpointManagerInterface|null
   */
  protected $breakPointManager;

  /**
   * Theme manager.
   *
   * @var \Drupal\Core\Theme\ThemeManagerInterface
   */
  protected $themeManager;

  /**
   * Cheeseburger menu trigger constructor.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, EntityTypeManagerInterface $entity_type_manager, ConfigFactoryInterface $config_factory, ThemeManagerInterface $theme_manager, BreakpointManagerInterface $break_point_manager = NULL) {
    parent::__construct($configuration, $plugin_id, $plugin_definition);
    $this->entityTypeManager = $entity_type_manager;
    $this->configFactory = $config_factory;
    $this->breakPointManager = $break_point_manager;
    $this->themeManager = $theme_manager;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('entity_type.manager'),
      $container->get('config.factory'),
      $container->get('theme.manager'),
      $container->has('breakpoint.manager') ? $container->get('breakpoint.manager') : NULL
    );
  }

  /**
   * {@inheritDoc}
   */
  public function defaultConfiguration() {
    return [
      'block_to_trigger' => NULL,
      'breakpoints' => [],
      'custom_media_query' => NULL,
    ] + parent::defaultConfiguration();
  }

  /**
   * {@inheritDoc}
   */
  public function calculateDependencies() {
    $dependencies = [];
    $block_to_trigger = $this->configuration['block_to_trigger'];
    $cheeseburger_block = $this->entityTypeManager->getStorage('block')->load($block_to_trigger);
    $dependencies['config'][] = $cheeseburger_block->getConfigDependencyName();
    return array_merge($dependencies, parent::calculateDependencies());
  }

  /**
   * {@inheritDoc}
   */
  public function buildConfigurationForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildConfigurationForm($form, $form_state);
    $conditions = [
      'plugin' => 'cheeseburger_menu',
    ];
    $form_object = $form_state->getFormObject();
    $theme = $this->configFactory->get('system.theme')->get('default');
    if ($form_object && method_exists($form_object, 'getEntity')) {
      $block = $form_object->getEntity();
      $theme = $block->getTheme();
      $conditions['theme'] = $block->getTheme();
    }
    $block_options = array_map(function ($menu_item) {
      return $menu_item->label() . ' (' . $menu_item->id() . ')';
    }, $this->entityTypeManager->getStorage('block')->loadByProperties($conditions));
    $form['block_to_trigger'] = [
      '#type' => 'radios',
      '#title' => $this->t('Block to trigger'),
      '#options' => $block_options,
      '#default_value' => $this->configuration['block_to_trigger'],
      '#required' => TRUE,
      '#description' => $this->t("<a href=\":url\">Place 'Cheeseburger menu' block</a> first in block layout. After that you can select that block here.", [
        ':url' => Url::fromRoute('block.admin_add', [
          'plugin_id' => 'cheeseburger_menu',
          'theme' => $theme,
        ])->toString(),
      ]),
    ];
    $breakpoints = [];
    if ($this->breakPointManager) {
      foreach ($this->breakPointManager->getGroups() as $group_id => $group) {
        $providers = $this->breakPointManager->getGroupProviders($group_id);
        if (isset($providers[$theme])) {
          foreach ($this->breakPointManager->getBreakpointsByGroup($group_id) as $breakpoint) {
            $breakpoints[$breakpoint->getMediaQuery()] = "{$breakpoint->getLabel()} ({$breakpoint->getMediaQuery()})";
          }
        }
      }
    }
    $form['breakpoints'] = [
      '#type' => 'checkboxes',
      '#title' => $this->t('Breakpoints'),
      '#descriptions' => $this->t('Choose breakpoints on which you want your trigger to appear'),
      '#options' => $breakpoints,
      '#default_value' => $this->configuration['breakpoints'],
      '#access' => FALSE,
    ];
    $form['custom_media_query'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Custom media query'),
      '#description' => '<ul><li>'
      . $this->t('Custom media query when trigger will not be displayed. Leave empty to show all the time.') . '</li><li>'
      . $this->t('Example: @media_query', ['@media_query' => 'all and (min-width: 500px)']) . '</li>',
      '#default_value' => $this->configuration['custom_media_query'],
    ];
    return $form;
  }

  /**
   * {@inheritDoc}
   */
  public function submitConfigurationForm(array &$form, FormStateInterface $form_state) {
    $this->configuration['block_to_trigger'] = $form_state->getValue('block_to_trigger');
    $this->configuration['breakpoints'] = array_filter($form_state->getValue('breakpoints'));
    $this->configuration['custom_media_query'] = !$form_state->isValueEmpty('custom_media_query') ? $form_state->getValue('custom_media_query') : NULL;
    parent::submitConfigurationForm($form, $form_state);
  }

  /**
   * {@inheritDoc}
   */
  public function build() {
    $block_id = 'block-' . str_replace('_', '-', $this->configuration['block_to_trigger']);
    if ($this->themeManager->getActiveTheme()->getName() === 'glisseo') {
      $block_id .= ', .block--' . str_replace('_', '-', $this->configuration['block_to_trigger']);
    }
    return [
      '#theme' => 'cheeseburger_menu_trigger',
      '#menu_id' => $block_id,
    ];
  }

}
