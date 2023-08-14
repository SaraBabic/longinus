<?php

namespace Drupal\publishing_options\Plugin\views\field;

use Drupal\views\Plugin\views\display\DisplayPluginBase;
use Drupal\views\Plugin\views\field\Boolean;
use Drupal\views\ViewExecutable;
use Drupal\Core\Form\FormStateInterface;
use Drupal\views\Views;

/**
 * Field handler to flag the node type.
 *
 * @ingroup views_field_handlers
 *
 * @ViewsField("publishing_options_field")
 */
class PublishingOptionsField extends Boolean {

  /**
   * {@inheritdoc}
   */
  public function init(ViewExecutable $view, DisplayPluginBase $display, array &$options = NULL) {
    parent::init($view, $display, $options);
  }

  /**
   * @{inheritdoc}
   */
  public function query() {
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
    // Add the field.
    $params = $this->options['group_type'] != 'group' ? ['function' => $this->options['group_type']] : [];
    $this->field_alias = $this->query->addField('publishing_options_option_node', 'selected', NULL, $params);

    $this->addAdditionalFields();
  }

  /**
   * Define the available options.
   *
   * @return array
   */
  protected function defineOptions() {
    $options = parent::defineOptions();

    return $options;
  }

  /**
   * Provide the options form.
   */
  public function buildOptionsForm(&$form, FormStateInterface $form_state) {
    parent::buildOptionsForm($form, $form_state);
  }

  // /**
  //   * @{inheritdoc}
  //   */
  //  public function render(ResultRow $values) {
  //    $node = $values->_entity;
  //
  //    if ($node->bundle() == $this->options['node_type']) {
  //      return $this->t('Hey, I\'m of the type: @type', array('@type' => $this->options['node_type']));
  //    }
  //    else {
  //      return $this->t('Hey, I\'m something else.');
  //    }
  //  }
}
