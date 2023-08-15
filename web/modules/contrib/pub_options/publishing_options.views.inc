<?php

/**
 * @file
 */

/**
 * Implements hook_views_data().
 */
function publishing_options_views_data_alter(array &$data) {
  $publishing_options = \Drupal::service('publishing_options.content');
  $publishing_options = $publishing_options->getPublishingOptions();

  if (!empty($publishing_options)) {
    foreach ($publishing_options as $publishing_option) {
      $machine_name = strtolower(str_replace(' ', '_', $publishing_option->title));
      $data['node_field_data'][$machine_name] = [
        'title' => t($publishing_option->title),
        'help' => t('A boolean indicating whether the node is visible for "' . $publishing_option->title . '".'),
        'filter' => [
          'title' => t($publishing_option->title),
          'field' => 'nid',
          'id' => 'publishing_options_filter',
        ],
        'argument' => [
          'id' => 'publishing_options_contextual_filter',
        ],
      ];

      $data['node'][$machine_name] = [
        'title' => t($publishing_option->title),
        'help' => 'A boolean indicating whether the node is visible for "' . $publishing_option->title . '".',
        'field' => [
          'title' => t($publishing_option->title),
          'field' => 'nid',
          'id' => 'publishing_options_field',
        ],
      ];
    }

    $data['node_field_data']['publishing_options'] = [
      'relationship' => [
        'title' => t('Publishing options'),
        'label' => t('Publishing options'),
        'group' => 'Content',
        'help' => t('A boolean indicating whether the node is visible for "' . $publishing_option->title . '"'),
        'id' => 'standard',
        'base' => 'publishing_options_option_node',
        'base field' => 'nid',
        'field' => 'nid',
      ],
    ];
  }
}
