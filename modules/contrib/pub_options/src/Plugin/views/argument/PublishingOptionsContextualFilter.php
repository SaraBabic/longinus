<?php

namespace Drupal\publishing_options\Plugin\views\argument;

use Drupal\views\Plugin\views\argument\ArgumentPluginBase;
use Drupal\views\Views;

/**
 * Argument for filtering by a team.
 *
 * @ViewsArgument("publishing_options_contextual_filter")
 */
class PublishingOptionsContextualFilter extends ArgumentPluginBase {

  /**
   * {@inheritdoc}
   */
  public function query($group_by = FALSE) {
    $this->ensureMyTable();

    $configuration = [
      'type' => 'LEFT',
      'table' => 'publishing_options_option_node',
      'field' => 'nid',
      'left_table' => 'node',
      'left_field' => 'nid',
      'operator' => '=',
    ];

    $join = Views::pluginManager('join')->createInstance('standard', $configuration);

    $this->query->addRelationship('publishing_options_option_node', $join, 'node');
    $this->query->addWhere('AND', 'publishing_options_option_node.selected', $this->value, $this->operator);
  }

}
