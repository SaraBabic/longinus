<?php

namespace Drupal\cheeseburger_menu;

use Drupal\Component\Utility\Html;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Template\Attribute;

/**
 * Cheeseburger menu class.
 */
class CheeseburgerMenu implements \IteratorAggregate {

  /**
   * Menu items.
   *
   * @var \Drupal\cheeseburger_menu\CheeseburgerMenuItem[]
   */
  protected $menuItems = [];

  /**
   * Navigation meni items.
   *
   * @var \Drupal\cheeseburger_menu\CheeseburgerMenuItem[]
   */
  protected $navigationMenuItems = [];

  /**
   * Menu title.
   *
   * @var string|\Drupal\Core\StringTranslation\TranslatableMarkup
   */
  public $title;

  /**
   * Is title hidden.
   *
   * @var bool
   */
  public $hiddenTitle = FALSE;

  /**
   * Is navigation title hidden.
   *
   * @var bool
   */
  public $navigationTitleHidden = FALSE;

  /**
   * Menu weight.
   *
   * @var int
   */
  public $weight;

  /**
   * Entity type id from which the menu is originally created.
   *
   * @var string
   */
  protected $originalEntityTypeId;

  /**
   * Entity id from which the menu is originally created.
   *
   * @var string|int
   */
  protected $originalEntityId;

  /**
   * Unique menu id.
   *
   * @var string
   */
  public $id;

  /**
   * Navigation item attribute.
   *
   * @var \Drupal\Core\Template\Attribute
   */
  public $navigationItemAttribute;

  /**
   * Menu title attribute.
   *
   * @var \Drupal\Core\Template\Attribute
   */
  public $titleAttribute;

  /**
   * Menu wrapper attributes.
   *
   * @var \Drupal\Core\Template\Attribute
   */
  public $wrapperAttribute;

  /**
   * Menu icon.
   *
   * @var string
   */
  public $icon;

  /**
   * Cache contexts.
   *
   * @var string[]
   */
  protected $cacheContexts = [];

  /**
   * Cheeseburger menu constructor.
   */
  public function __construct($title = NULL) {
    $this->setTitle($title);
    $this->navigationItemAttribute = new Attribute(['class' => ['cheeseburger-menu__side-menu-item']]);
    $this->titleAttribute = new Attribute(['class' => ['cheeseburger-menu__title']]);
    $this->wrapperAttribute = new Attribute();
  }

  /**
   * Creates menu from settings.
   *
   * @param array $settings
   *   Settings to create menu from.
   * @param \Drupal\Core\Entity\EntityInterface $entity
   *   Entity as source, menu and taxonomy vocabulary are supported.
   *
   * @return static
   *   A new cheeseburger menu object.
   */
  public static function createFromSettings(array $settings, EntityInterface $entity) {
    $instance = new static();
    if ($settings['settings']['override_title']) {
      $instance->setTitle($settings['settings']['title_override']);
    }
    else {
      $instance->setTitle($entity->label());
    }
    if (!$settings['settings']['show_title_in_navigation']) {
      $instance->hideNavigationTitle();
    }
    if (!$settings['settings']['show_title_above_menu']) {
      $instance->hideTitle();
    }

    if ($settings['settings']['collapsible_title'] ?? FALSE) {
      $instance->wrapperAttribute->addClass('cheeseburger-menu__title--collapsible');
      if ($settings['settings']['title_default_expanded'] ?? TRUE) {
        $instance->wrapperAttribute->addClass('cheeseburger-menu__title--expanded');
      }
    }

    $instance->setIcon($settings['settings']['icon'])
      ->setOriginalEntityId($entity->id())
      ->setOriginalEntityTypeId($entity->getEntityTypeId())
      ->setWeight($settings['weight']);
    $instance->id = Html::cleanCssIdentifier($entity->getEntityTypeId() . '-' . $entity->id());
    return $instance;
  }

  /**
   * Returns unique menu id.
   *
   * @return string
   *   Unique menu id.
   */
  public function getId() {
    return $this->id;
  }

  /**
   * Cheeseburger menu as attribute.
   *
   * @return \Drupal\Core\Template\Attribute
   *   Menu id attribute.
   */
  public function getIdAsAttribute() {
    return new Attribute([
      'data-cheeseburger-id' => $this->getId(),
    ]);
  }

  /**
   * Append menu item to menu.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem $menu_item
   *   Menu item.
   *
   * @return static
   *   The object itself for chaining
   */
  public function addMenuItem(CheeseburgerMenuItem $menu_item) {
    $this->menuItems[] = $menu_item;
    $this->mergeCacheContext($menu_item->getCacheContexts());
    return $this;
  }

  /**
   * Sets menu items.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem[] $menu_items
   *   Menu items.
   *
   * @return static
   *   The object itself for chaining
   */
  public function setMenuItems(array $menu_items) {
    $this->menuItems = $menu_items;
    return $this;
  }

  /**
   * Returns menu items.
   *
   * @return \Drupal\cheeseburger_menu\CheeseburgerMenuItem[]
   *   Menu items.
   */
  public function getMenuItems() {
    return $this->menuItems;
  }

  /**
   * Menu items.
   */
  public function getIterator(): \Traversable {
    return new \ArrayIterator($this->menuItems);
  }

  /**
   * Append menu item to navigation.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem $menu_item
   *   Menu item.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function addNavigationMenuItem(CheeseburgerMenuItem $menu_item) {
    $this->navigationMenuItems[] = $menu_item;
    return $this;
  }

  /**
   * Sets navigation menu items.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem[] $menu_items
   *   Menu items.
   *
   * @return static
   *   The object itself for chaining
   */
  public function setNavigationMenuItems(array $menu_items) {
    $this->navigationMenuItems = $menu_items;
    return $this;
  }

  /**
   * Returns menu items.
   *
   * @return \Drupal\cheeseburger_menu\CheeseburgerMenuItem[]
   *   Menu items.
   */
  public function getNavigationMenuItems() {
    return $this->navigationMenuItems;
  }

  /**
   * Returns menu title.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup|string
   *   Menu title.
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Sets menu title.
   *
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup|string $title
   *   Menu title.
   */
  public function setTitle($title) {
    $this->title = $title;
  }

  /**
   * Returns whether menu has title or not.
   *
   * @return bool
   *   TRUE if has title, FALSE otherwise.
   */
  public function isTitleHidden() {
    return $this->hiddenTitle;
  }

  /**
   * Returns whether menu has title or not.
   *
   * @return bool
   *   TRUE if has title, FALSE otherwise.
   */
  public function isNavigationTitleHidden() {
    return $this->navigationTitleHidden;
  }

  /**
   * Hides title.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function hideTitle() {
    $this->hiddenTitle = TRUE;
    return $this;
  }

  /**
   * Hides title.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function hideNavigationTitle() {
    $this->navigationTitleHidden = TRUE;
    return $this;
  }

  /**
   * Menu weight.
   *
   * @return int
   *   Menu weight.
   */
  public function getWeight() {
    return $this->weight;
  }

  /**
   * Set menu weight.
   *
   * @param int $weight
   *   Set menu weight.
   */
  public function setWeight($weight) {
    $this->weight = $weight;
    return $this;
  }

  /**
   * Set menu icon.
   *
   * @todo add jpg and png support.
   *
   * @param string $icon_content
   *   Icon content.
   */
  public function setIcon($icon_content) {
    $this->icon = $icon_content;
    return $this;
  }

  /**
   * Returns menu icon content.
   *
   * @return string
   *   Icon content.
   */
  public function getIcon() {
    return $this->icon;
  }

  /**
   * Menu has icon.
   *
   * @return bool
   *   Menu has icon.
   */
  public function hasIcon() {
    return !empty($this->icon);
  }

  /**
   * Sets original entity id.
   *
   * @param int|string $original_entity_id
   *   Original entity ID.
   *
   * @return static
   *   Returns itself for chaining.
   */
  public function setOriginalEntityId($original_entity_id) {
    $this->originalEntityId = $original_entity_id;
    return $this;
  }

  /**
   * Returns original entity ID.
   *
   * @return int|string
   *   Original entity ID.
   */
  public function getOriginalEntityId() {
    return $this->originalEntityId;
  }

  /**
   * Sets original entity type id.
   *
   * @param string $original_entity_type_id
   *   Original entity type id.
   */
  public function setOriginalEntityTypeId(string $original_entity_type_id) {
    $this->originalEntityTypeId = $original_entity_type_id;
    return $this;
  }

  /**
   * Returns original entity type id.
   *
   * @return string
   *   Original entity type id.
   */
  public function getOriginalEntityTypeId() {
    return $this->originalEntityTypeId;
  }

  /**
   * Merges cache contexts.
   *
   * @param string[] $cache_contexts
   *   Cache contexts to merge.
   *
   * @return static
   *   Returns itself for chaining.
   */
  public function mergeCacheContext(array $cache_contexts) {
    $this->cacheContexts = Cache::mergeContexts($cache_contexts, $this->cacheContexts);
    return $this;
  }

  /**
   * Returns ache contexts.
   *
   * @return string[]
   *   Cache contexts.
   */
  public function getCacheContexts() {
    return $this->cacheContexts;
  }

  /**
   * Sets cache contexts.
   *
   * @param array $cache_contexts
   *   Sets cache contexts.
   *
   * @return static
   *   Returns itself for chaining.
   */
  public function setCacheContext(array $cache_contexts) {
    $this->cacheContexts = $cache_contexts;
    return $this;
  }

}
