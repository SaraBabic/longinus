<?php

namespace Drupal\cheeseburger_menu\Plugin\Deriver;

use Drupal\Component\Plugin\Derivative\DeriverBase;
use Drupal\Core\Language\LanguageManagerInterface;
use Drupal\Core\Plugin\Discovery\ContainerDeriverInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Provides a deriver for each language.
 */
class LanguageSwitchLinksDeriver extends DeriverBase implements ContainerDeriverInterface {

  /**
   * Language manager.
   *
   * @var \Drupal\Core\Language\LanguageManagerInterface
   */
  protected $languageManager;

  /**
   * LanguageSwitchLinksDeriver constructor.
   *
   * @param \Drupal\Core\Language\LanguageManagerInterface $language_manager
   *   Language manager.
   */
  public function __construct(LanguageManagerInterface $language_manager) {
    $this->languageManager = $language_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, $base_plugin_id) {
    return new static(
      $container->get('language_manager')
    );
  }

  /**
   * {@inheritdoc}
   */
  public function getDerivativeDefinitions($base_plugin_definition) {
    $plugin_definitions = [];
    $languages = $this->languageManager->getLanguages();
    foreach ($languages as $language) {
      $plugin_id = "language_switch_{$language->getId()}";
      $plugin_definitions[$plugin_id] = [
        'id' => $plugin_id,
        'menu_name' => 'language',
        'class' => '\Drupal\cheeseburger_menu\Plugin\Menu\LanguageSwitchMenuLink',
        'provider' => 'cheeseburger_menu',
        'options' => ['langcode' => $language->getId()],
        'metadata' => $language->getId(),
        'weight' => $language->getWeight(),
      ];
    }
    return $plugin_definitions;
  }

}
