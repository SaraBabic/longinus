<?php

namespace Drupal\publishing_options\Plugin\views\filter;

use Drupal\views\Plugin\views\display\DisplayPluginBase;
use Drupal\views\Plugin\views\filter\BooleanOperator;
use Drupal\views\ViewExecutable;
use Drupal\views\Views;

/**
 * Filters by given list of node title options.
 *
 * @ingroup views_filter_handlers
 *
 * @ViewsFilter("publishing_options_filter")
 */
class PublishingOptionsFilters extends BooleanOperator {

  /**
   * {@inheritdoc}
   */
  public function init(ViewExecutable $view, DisplayPluginBase $display, array &$options = NULL) {
    parent::init($view, $display, $options);
    $this->definition['type'] = 'yes-no';
  }

  /**
   * {@inheritdoc}
   */
  public function query() {
    $configuration = [
      'type' => 'LEFT',
      'table' => 'publishing_options_option_node',
      'field' => 'nid',
      'left_table' => 'node_field_data',
      'left_field' => 'nid',
      'operator' => '=',
    ];

    $join = Views::pluginManager('join')->createInstance('standard', $configuration);

    $this->query->addRelationship('publishing_options_option_node', $join, 'node');
    $this->query->addWhere('AND', 'publishing_options_option_node.selected', $this->value, $this->operator);
  }

  /**
   * Returns an array of operator information.
   *
   * @return array
   */
  protected function operators() {
    return [
      '=' => [
        'title' => $this->t('Is promoted to'),
        'method' => 'queryOpBoolean',
        'short' => $this->t('='),
        'values' => 1,
        'query_operator' => self::EQUAL,
      ],
      '!=' => [
        'title' => $this->t('Is not promoted to'),
        'method' => 'queryOpBoolean',
        'short' => $this->t('!='),
        'values' => 1,
        'query_operator' => self::NOT_EQUAL,
      ],
    ];
  }

}
