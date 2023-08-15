<?php

/**
 * Add language menu if not exists.
 */
function cheeseburger_menu_post_update_add_language_menu(&$sandbox) {
  $language = \Drupal::entityTypeManager()->getStorage('menu')->load('language');
  if (!$language) {
    $language = \Drupal::entityTypeManager()->getStorage('menu')->create([
      'langcode' => 'und',
      'status' => TRUE,
      'dependencies' => [
        'module' => [
          'cheeseburger_menu'
        ],
      ],
      'third_party_settings' => [
        'cheeseburger_menu' => [
          'use_langcode' => TRUE,
        ],
      ],
      'id' => 'language',
      'label' => 'Language',
      'description' => 'Language switcher links',
      'locked' => FALSE,
    ]);
    $language->save();
  }
}
