<?php

namespace Drupal\Tests\cheeseburger_menu\Kernel;

use Drupal\cheeseburger_menu\CheeseburgerMenuItem;
use Drupal\Tests\token\Kernel\KernelTestBase;

/**
 * Test description.
 *
 * @group cheeseburger_menu
 */
class BasicCheeseburgerMenuTest extends KernelTestBase {

  const TEST_MENU_ID = 'cheese_test_menu';

  /**
   * Menu array to create from.
   *
   * @var array
   */
  public static $menuArray = [
    '1' => ['1' => ['1' => []], '2' => [], '3' => []],
    '2' => [],
    '3' => ['1' => []],
  ];

  /**
   * {@inheritdoc}
   */
  protected static $modules = [
    'system',
    'link',
    'user',
    'menu_link_content',
    'cheeseburger_menu',
    'taxonomy',
    'text',
  ];

  /**
   * {@inheritDoc}
   */
  protected function setUp() {
    parent::setUp();
    $this->installEntitySchema('menu_link_content');
    $this->installEntitySchema('taxonomy_term');
    $role = $this->container->get('entity_type.manager')->getStorage('user_role')->create([
      'id' => 'anonymous',
      'label' => 'anonymous',
    ]);
    $role->grantPermission('access content');
    $role->save();
  }

  /**
   * Test callback.
   */
  public function testCheeseburgerMenuStructure() {
    $this->createMenu();
    /** @var \Drupal\cheeseburger_menu\CheeseburgerMenu $cheeseburger_menu */
    $cheeseburger_menu = $this->container->get('cheeseburger_menu.service')->buildMenu([
      'id' => self::TEST_MENU_ID,
      'settings' => [
        'max_depth' => 0,
        'default_expanded' => FALSE,
        'override_title' => FALSE,
        'show_title_in_navigation' => TRUE,
        'show_title_above_menu' => TRUE,
        'icon' => '',
        'show_links_in_navigation' => FALSE,
      ],
      'weight' => 1,
    ]);
    foreach ($cheeseburger_menu as $cheeseburger_menu_item) {
      /** @var \Drupal\cheeseburger_menu\CheeseburgerMenuItem $cheeseburger_menu_item */
      $this->assertMenuItem($cheeseburger_menu_item, self::$menuArray);
    }
  }

  /**
   * Test callback.
   */
  public function testCheeseburgerVocabularyStructure() {
    $this->createVocabulary();
    /** @var \Drupal\cheeseburger_menu\CheeseburgerMenu $cheeseburger_menu */
    $cheeseburger_menu = $this->container->get('cheeseburger_menu.service')->buildMenuFromVocabulary([
      'id' => self::TEST_MENU_ID,
      'settings' => [
        'max_depth' => 0,
        'default_expanded' => FALSE,
        'override_title' => FALSE,
        'show_title_in_navigation' => TRUE,
        'show_title_above_menu' => TRUE,
        'icon' => '',
        'show_links_in_navigation' => FALSE,
      ],
      'weight' => 1,
    ]);
    $has_item = FALSE;
    foreach ($cheeseburger_menu as $cheeseburger_menu_item) {
      $has_item = TRUE;
      /** @var \Drupal\cheeseburger_menu\CheeseburgerMenuItem $cheeseburger_menu_item */
      $this->assertMenuItem($cheeseburger_menu_item, self::$menuArray);
    }
    $this->assertTrue($has_item);
  }

  /**
   * Asserts menu item from created array.
   */
  public function assertMenuItem(CheeseburgerMenuItem $cheeseburger_menu_item, $menu_array) {
    $depth = explode('.', $cheeseburger_menu_item->getTitle());
    foreach ($depth as $number) {
      $this->assertTrue(isset($menu_array[$number]));
    }
    foreach ($cheeseburger_menu_item->getChildren() as $cheeseburger_menu_item_child) {
      $this->assertMenuItem($cheeseburger_menu_item_child, $menu_array);
    }
  }

  /**
   * Create menu.
   */
  private function createMenu() {
    $this->container->get('entity_type.manager')->getStorage('menu')->create([
      'id' => self::TEST_MENU_ID,
      'label' => 'Cheese test menu',
    ])->save();

    $this->createMenuLinkContent(self::$menuArray);
  }

  /**
   * Creates menu link content from array.
   */
  private function createMenuLinkContent(array $names, $prefix = '', $parent = NULL) {
    foreach ($names as $menu_name => $children) {
      $menu = $this->container->get('entity_type.manager')->getStorage('menu_link_content')->create([
        'title' => empty($prefix) ? $menu_name : "$prefix.$menu_name",
        'menu_name' => self::TEST_MENU_ID,
        'link' => ['uri' => 'route:<nolink>'],
        'weight' => $menu_name,
        'parent' => $parent,
      ]);
      $menu->save();
      $this->createMenuLinkContent($children, empty($prefix) ? $menu_name : "$prefix.$menu_name", "menu_link_content:{$menu->uuid()}");
    }
  }

  /**
   * Creates vocabulary and terms used in testing.
   */
  private function createVocabulary() {
    $this->container->get('entity_type.manager')->getStorage('taxonomy_vocabulary')->create([
      'vid' => self::TEST_MENU_ID,
      'name' => 'Cheese test menu',
    ])->save();
    $this->createTaxonomyTerm(self::$menuArray);
  }

  /**
   * Creates taxonomy term witch schemed names.
   */
  private function createTaxonomyTerm(array $names, $prefix = '', $parent = NULL) {
    foreach ($names as $menu_name => $children) {
      $taxonomy_term = $this->container->get('entity_type.manager')->getStorage('taxonomy_term')->create([
        'name' => empty($prefix) ? $menu_name : "$prefix.$menu_name",
        'vid' => self::TEST_MENU_ID,
        'weight' => $menu_name,
        'parent' => isset($parent) ? ['target_id' => $parent] : NULL,
      ]);
      $taxonomy_term->save();
      $this->createTaxonomyTerm($children, empty($prefix) ? $menu_name : "$prefix.$menu_name", $taxonomy_term->id());
    }
  }

}
