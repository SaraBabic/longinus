<?php

namespace Drupal\cheeseburger_menu\Plugin\Menu;

use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Menu\StaticMenuLinkOverridesInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\Core\Url;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Path\PathMatcherInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Menu\MenuLinkDefault;

/**
 * Language switcher link - dynamically changes based on langcode.
 */
class LanguageSwitchMenuLink extends MenuLinkDefault implements ContainerFactoryPluginInterface {

  /**
   * {@inheritdoc}
   */
  protected $overrideAllowed = [
    'weight' => 1,
    'enabled' => 1,
  ];

  /**
   * The language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * Path matcher.
   *
   * @var \Drupal\Core\Path\PathMatcherInterface
   */
  protected $pathMatcher;

  /**
   * Entity type manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Constructs a new MenuLinkContent.
   *
   * @param array $configuration
   *   A configuration array containing information about the plugin instance.
   * @param string $plugin_id
   *   The plugin_id for the plugin instance.
   * @param mixed $plugin_definition
   *   The plugin implementation definition.
   * @param \Drupal\Core\Menu\StaticMenuLinkOverridesInterface $static_override
   *   The static override storage.
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   The language manager.
   * @param \Drupal\Core\Path\PathMatcherInterface $path_matcher
   *   Path matcher.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager.
   */
  public function __construct(array $configuration, $plugin_id, $plugin_definition, StaticMenuLinkOverridesInterface $static_override, LanguageManagerInterface $language_manager, PathMatcherInterface $path_matcher, EntityTypeManagerInterface $entity_type_manager, RouteMatchInterface $route_match) {
    parent::__construct($configuration, $plugin_id, $plugin_definition, $static_override);
    $this->languageManager = $language_manager;
    $this->pathMatcher = $path_matcher;
    $this->entityTypeManager = $entity_type_manager;
    $this->routeMatch = $route_match;
  }

  /**
   * {@inheritDoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $configuration,
      $plugin_id,
      $plugin_definition,
      $container->get('menu_link.static.overrides'),
      $container->get('language_manager'),
      $container->get('path.matcher'),
      $container->get('entity_type.manager'),
      $container->get('current_route_match')
    );
  }

  /**
   * {@inheritDoc}
   */
  public function getOptions() {
    $options = parent::getOptions();
    if ($this->languageManager->getCurrentLanguage()->getId() === $options['langcode']) {
      $options['cheeseburger_attributes']['class'][] = 'active-lang';
    }
    return $options;
  }

  /**
   * {@inheritDoc}
   */
  public function getTitle() {
    $language_menu = $this->entityTypeManager->getStorage('menu')->load('language');
    $langcode = $this->getOptions()['langcode'];
    return $language_menu->getThirdPartySetting('cheeseburger_menu', 'use_langcode', TRUE) ? $langcode : $this->languageManager
      ->getLanguageName($langcode);
  }

  /**
   * {@inheritDoc}
   */
  public function getUrlObject($title_attribute = TRUE) {
    if ($this->pathMatcher->isFrontPage()) {
      $url = Url::fromRoute('<front>');
    }
    else {
      $current_route = $this->routeMatch->getRouteObject();
      $options = $current_route->getOptions();
      $url = Url::fromRoute($this->routeMatch->getRouteName(), $this->routeMatch->getRawParameters()->all(), $options);
    }

    $language = $this->languageManager->getLanguage($this->getOptions()['langcode']);
    return $url->setOption('language', $language);
  }

  /**
   * {@inheritDoc}
   */
  public function getDescription() {
    return $this->t('Menu link to current page on certain language');
  }

  /**
   * {@inheritDoc}
   */
  public function getCacheContexts() {
    $language_menu = $this->entityTypeManager->getStorage('menu')->load('language');
    $cache_contexts = ['languages:language_interface'];
    // This is not the best, unfortunately, at this point I don't see any
    // other solution.
    if (!$language_menu->getThirdPartySetting('cheeseburger_menu', 'link_front_page', FALSE)) {
      $cache_contexts[] = 'url.path';
    }
    return $cache_contexts;
  }

  /**
   * {@inheritDoc}
   */
  public function getCacheTags() {
    return [
      'config:system.menu.language',
    ];
  }

}
