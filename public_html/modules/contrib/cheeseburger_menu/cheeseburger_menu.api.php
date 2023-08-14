<?php

use Drupal\cheeseburger_menu\CheeseburgerMenuItem;
use Drupal\cheeseburger_menu\CheeseburgerMenu;
/**
 * @file
 * Hooks provided by the Cheeseburger menu module.
 */

/**
 * @addtogroup hooks
 * @{
 */

/**
 * Implements hook_cheeseburger_menu_item_alter().
 */
function hook_cheeseburger_menu_item_alter(CheeseburgerMenuItem $cheeseburger_menu_item) {
  if ($cheeseburger_menu_item->getOriginalEntityTypeId() === 'menu_link_content' && $cheeseburger_menu_item->getOriginalEntityId() === 'menu_link_content:b59d109e-3800-4a2d-a8ee-170435ce05ed') {
    $cheeseburger_menu_item->attribute->addClass('highlighted-menu-item');
  }
  if ($cheeseburger_menu_item->getOriginalEntityTypeId() === 'taxonomy_term' && $cheeseburger_menu_item->getOriginalEntityId() == '12') {
    $cheeseburger_menu_item->labelAttribute->setAttribute('data-mrmot', 'example');
    $cheeseburger_menu_item->triggerAttribute->addClass('highlighted-trigger-class');
  }
}

/**
 * Implements hook_cheeseburger_menu_alter().
 */
function hook_cheeseburger_menu_alter(CheeseburgerMenu $cheeseburger_menu) {
  if ($cheeseburger_menu->getOriginalEntityTypeId() === 'menu' && $cheeseburger_menu->getOriginalEntityId() === 'main') {
    $cheeseburger_menu->setTitle('Cheeseburger title for menu');
    $cheeseburger_menu->navigationItemAttribute->addClass('special-menu-navigation-class');
    $cheeseburger_menu->titleAttribute->addClass('special-menu-title-class');
  }
  if ($cheeseburger_menu->getOriginalEntityTypeId() === 'taxonomy_vocabulary' && $cheeseburger_menu->getOriginalEntityId() === 'category') {
    $cheeseburger_menu->setTitle('Cheeseburger taxonomy menu example');
  }
}

/**
 * Implements hook_cheeseburger_menu_tree_manipulators_alter().
 */
function hook_cheeseburger_menu_tree_manipulators_alter(&$manipulators, $menu_link_tree) {
  $manipulators[] = ['callable' => 'menu.language_tree_manipulator:filterLanguage'];
}

/**
 * @} End of "addtogroup hooks".
 */
