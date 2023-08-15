<?php

namespace Drupal\cheeseburger_menu;

use Drupal\Core\Access\AccessResultInterface;
use Drupal\Core\Cache\Cache;
use Drupal\Core\Menu\MenuLinkTreeElement;
use Drupal\Core\Template\Attribute;
use Drupal\Core\Url;
use Drupal\taxonomy\Entity\Term;
use Drupal\Component\Utility\Html;

/**
 * Cheeseburger menu item class.
 */
class CheeseburgerMenuItem {

  /**
   * Menu item title.
   *
   * @var string|\Drupal\Core\StringTranslation\TranslatableMarkup
   */
  public $title;

  /**
   * Menu item url.
   *
   * @var \Drupal\Core\Url
   */
  public $url;

  /**
   * Menu item attributes.
   *
   * @var \Drupal\Core\Template\Attribute
   */
  public $attribute;

  /**
   * Menu label attributes.
   *
   * @var \Drupal\Core\Template\Attribute
   */
  public $labelAttribute;

  /**
   * Menu trigger attributes.
   *
   * @var \Drupal\Core\Template\Attribute
   */
  public $triggerAttribute;

  /**
   * Menu item children.
   *
   * @var \Drupal\cheeseburger_menu\CheeseburgerMenuItem[]
   */
  protected $children = [];

  /**
   * Is menu item link.
   *
   * @var bool
   */
  public $isLink = TRUE;

  /**
   * Entity type id from which the menu item is originally created.
   *
   * @var string
   */
  protected $originalEntityTypeId;

  /**
   * Entity id from which the menu item is originally created.
   *
   * @var string|int
   */
  protected $originalEntityId;

  /**
   * Cache contexts.
   *
   * @var string[]
   */
  protected $cacheContexts = [];

  /**
   * CheeseburgerMenuItem constructor.
   *
   * @param string|\Drupal\Core\StringTranslation\TranslatableMarkup $title
   *   Menu item title.
   * @param \Drupal\Core\Url $url
   *   Menu item url.
   * @param \Drupal\Core\Template\Attribute|null $attribute
   *   Menu item attributes.
   */
  public function __construct($title, Url $url, Attribute $attribute = NULL) {
    $this->title = $title;
    $this->url = $url;
    if (isset($attribute)) {
      $this->attribute = $attribute;
    }
    else {
      $this->attribute = new Attribute();
    }
    $this->labelAttribute = new Attribute(['class' => ['cheeseburger-menu__item-label']]);
    $this->triggerAttribute = new Attribute(['class' => ['cheeseburger-menu__submenu-trigger']]);
  }

  /**
   * Creates cheeseburger menu item from menu link tree.
   *
   * @param \Drupal\Core\Menu\MenuLinkTreeElement $menu_link_tree_element
   *   Menu link tree element to create from.
   * @param bool $menu_item_settings
   *   @see \Drupal\cheeseburger_menu\CheeseburgerMenuItem::applySettings()
   *
   * @return static
   *   Created cheeseburger menu item.
   */
  public static function createFromMenuLinkTreeElement(MenuLinkTreeElement $menu_link_tree_element, $menu_item_settings = []) {
    $attribute = new Attribute([
      'class' => [
        'menu-link',
        'cheeseburger-menu__item',
        Html::cleanCssIdentifier($menu_link_tree_element->link->getMenuName()) . '__item',
      ],
    ]);

    $options = $menu_link_tree_element->link->getOptions();
    // @todo: Write doc for cheeseburger only attributes.
    if (isset($options['cheeseburger_attributes'])) {
      $cheeseburger_attributes = new Attribute($options['cheeseburger_attributes']);
      $attribute->merge($cheeseburger_attributes);
    }

    $menu_link_item_instance = new static(
      $menu_link_tree_element->link->getTitle(),
      $menu_link_tree_element->link->getUrlObject(),
      $attribute
    );

    $menu_link_item_instance->mergeCacheContext($menu_link_tree_element->link->getCacheContexts());

    if (isset($options['attributes'])) {
      $default_attributes = new Attribute($options['attributes']);
      $menu_link_item_instance->labelAttribute->merge($default_attributes);
    }

    foreach ($menu_link_tree_element->subtree as $subtree_menu_link_tree_element) {
      if ((!($subtree_menu_link_tree_element->access instanceof AccessResultInterface) || $subtree_menu_link_tree_element->access->isAllowed()) && $subtree_menu_link_tree_element->link->isEnabled()) {
        $menu_link_item_instance->addChild(self::createFromMenuLinkTreeElement($subtree_menu_link_tree_element, $menu_item_settings));
      }
    }
    $menu_link_item_instance->applySettings($menu_item_settings)
      ->setOriginalEntityTypeId($menu_link_tree_element->link->getBaseId())
      ->setOriginalEntityId($menu_link_tree_element->link->getPluginId());
    if ($menu_link_tree_element->inActiveTrail) {
      $menu_link_item_instance->setIsInActiveTrail();
    }
    return $menu_link_item_instance;
  }

  /**
   * Creates cheeseburger menu item from taxonomy term.
   *
   * @param \Drupal\taxonomy\Entity\Term $taxonomy_term
   *   Taxonomy term.
   * @param array $menu_item_settings
   *   @see \Drupal\cheeseburger_menu\CheeseburgerMenuItem::applySettings()
   * @param int $max_depth
   *   Max depth children.
   * @param int $current_depth
   *   Current depth, not intended to be be used outside of function.
   * @param boolean|string $langcode
   *   Langcode, in case equals FALSE, translation will not be used.
   *
   * @return static
   *   Created cheeseburger menu item.
   */
  public static function createFromTaxonomyVocabulary(Term $taxonomy_term, array $menu_item_settings = [], $max_depth = 0, $current_depth = 1, $langcode = FALSE) {
    $attribute = new Attribute([
      'class' => [
        'cheeseburger-menu__item',
        Html::cleanCssIdentifier($taxonomy_term->bundle()) . '__item',
      ],
    ]);
    if ($langcode && $taxonomy_term->hasTranslation($langcode)) {
      $taxonomy_term = $taxonomy_term->getTranslation($langcode);
    }
    $menu_link_item_instance = new static(
      $taxonomy_term->label(),
      $taxonomy_term->toUrl(),
      $attribute
    );
    foreach (\Drupal::entityTypeManager()->getStorage('taxonomy_term')->getChildren($taxonomy_term) as $child_taxonomy_term) {
      if ($child_taxonomy_term->access('view') && (empty($max_depth) || ($current_depth < $max_depth))) {
        $menu_link_item_instance->addChild(self::createFromTaxonomyVocabulary($child_taxonomy_term, $menu_item_settings, $max_depth, $current_depth + 1, $langcode));
      }
    }
    $menu_link_item_instance->applySettings($menu_item_settings)
      ->setOriginalEntityTypeId($taxonomy_term->getEntityTypeId())
      ->setOriginalEntityId($taxonomy_term->id());
    if (in_array($taxonomy_term->id(), $menu_item_settings['active_trail'])) {
      $menu_link_item_instance->setIsInActiveTrail();
    }
    return $menu_link_item_instance;
  }

  /**
   * Set menu item title.
   *
   * @param \Drupal\Core\StringTranslation\TranslatableMarkup|string $title
   *   Menu item title.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function setTitle($title) {
    $this->title = $title;
    return $this;
  }

  /**
   * Returns menu item title.
   *
   * @return \Drupal\Core\StringTranslation\TranslatableMarkup|string
   *   Menu item title.
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * Sets menu item url.
   *
   * @param \Drupal\Core\Url $url
   *   Menu item url.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function setUrl(Url $url) {
    $this->url = $url;
    return $this;
  }

  /**
   * Returns menu item url.
   *
   * @return \Drupal\Core\Url
   *   Menu item url.
   */
  public function getUrl() {
    return $this->url;
  }

  /**
   * Sets menu item attribute.
   *
   * @param \Drupal\Core\Template\Attribute $attribute
   *   Menu item attribute.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function setAttribute(Attribute $attribute) {
    $this->attribute = $attribute;
    return $this;
  }

  /**
   * Returns menu item attribute.
   *
   * @return \Drupal\Core\Template\Attribute
   *   Menu item attribute.
   */
  public function getAttribute() {
    return $this->attribute;
  }

  /**
   * Returns menu item children.
   *
   * @return \Drupal\cheeseburger_menu\CheeseburgerMenuItem[]
   *   Menu item children.
   */
  public function getChildren() {
    return $this->children;
  }

  /**
   * Sets menu item children.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem[] $children
   *   Menu item children.
   */
  public function setChildren(array $children) {
    $this->children = $children;
  }

  /**
   * Appends menu item child.
   *
   * @param \Drupal\cheeseburger_menu\CheeseburgerMenuItem $child
   *   Menu item child.
   */
  public function addChild(CheeseburgerMenuItem $child) {
    $this->children[] = $child;
    // We need to bubble up cache contexts.
    $this->mergeCacheContext($child->getCacheContexts());
  }

  /**
   * Returns whether menu item has child or not.
   *
   * @return bool
   *   TRUE if has child, FALSE otherwise.
   */
  public function hasChild() {
    return count($this->children) > 0;
  }

  /**
   * Returns whether menu item is link or not.
   *
   * @return bool
   *   TRUE if is link, FALSE otherwise.
   */
  public function isLink() {
    if ($this->url->isRouted() && $this->url->getRouteName() === '<nolink>') {
      return FALSE;
    }
    return $this->isLink;
  }

  /**
   * Sets if menu item is link.
   *
   * @param bool $is_link
   *   TRUE if is link, FALSE otherwise.
   */
  public function setIsLink($is_link) {
    $this->isLink = $is_link;
  }

  /**
   * Adds is in active trail class.
   *
   * @param bool $is_in_active_trail
   *   Is in active trail.
   *
   * @return static
   *   The object itself for chaining.
   */
  public function setIsInActiveTrail($is_in_active_trail = TRUE) {
    if ($is_in_active_trail) {
      $this->attribute->addClass('in-active-trail');
    }
    else {
      $this->attribute->removeClass('in-active-trail');
    }
    return $this;
  }

  /**
   * Applies default values to missing settings.
   *
   * @param array $settings
   *   Settings that should be modified.
   */
  protected static function applyDefaultMenuSettings(array &$settings) {
    $settings += [
      'parent_as_link' => FALSE,
      'expanded' => FALSE,
      'active_trail' => [],
    ];
  }

  /**
   * Applies given settings to menu item.
   *
   * @param array $settings
   *   An associative array containing:
   *   - parent_as_link: A boolean indicating is parent menu item link.
   *     Defaults to FALSE.
   *   - expanded: A boolean indicating that menu item is expanded.
   *     Defaults to FALSE.
   *   - active_trail: A array with current active trail.
   *     Defaults to empty array.
   */
  public function applySettings(array $settings) {
    static::applyDefaultMenuSettings($settings);
    if ($settings['parent_as_link']) {
      $this->setIsLink(TRUE);
    }
    elseif ($this->hasChild()) {
      $this->setIsLink(FALSE);
    }
    if ($settings['expanded']) {
      $this->getAttribute()->addClass('cheeseburger-menu__item--is-expanded')->setAttribute('data-cheeseburger-default-expand', '');
    }
    else {
      $this->getAttribute()->removeClass('cheeseburger-menu__item--is-expanded');
    }
    if ($this->hasChild()) {
      $this->getAttribute()->addClass('cheeseburger-parent');
    }
    else {
      $this->getAttribute()->removeClass('cheeseburger-parent');
    }
    return $this;
  }

  /**
   * Sets original entity id.
   *
   * @param int|string $original_entity_id
   *   Original entity id.
   */
  public function setOriginalEntityId($original_entity_id) {
    $this->originalEntityId = $original_entity_id;
    return $this;
  }

  /**
   * Returns original entity id.
   *
   * @return int|string
   *   Original entity id.
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
