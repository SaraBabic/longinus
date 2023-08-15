<?php

namespace Drupal\publishing_options\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\publishing_options\Services\PublishingOptionsContent;
use Drupal\Core\Entity\EntityTypeManager;

/**
 * Implements an example form.
 */
class PublishingOptionsForm extends ConfigFormBase {

  /**
   * Publishing option id.
   */
  protected $id;

  /**
   * Publishing options service.
   */
  protected $publishing_options;

  /**
   * Entity type manager service.
   */
  protected $entity_type_manager;

  /**
   * Construct the new form object.
   *
   * @param \Drupal\publishing_options\Services\PublishingOptionsContent $publishing_options
   *   The publishing options service.
   */
  public function __construct(PublishingOptionsContent $publishing_options, EntityTypeManager $entity_type_manager) {
    $this->publishing_options = $publishing_options;
    $this->entity_type_manager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    $form = new static(
      $container->get('publishing_options.content'),
      $container->get('entity_type.manager')
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getEditableConfigNames() {
    return ['publishing_options_form.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'publishing_options_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL) {
    $form = parent::buildForm($form, $form_state);

    $form_values = $form_state->getValues();
    $node_types = $this->entity_type_manager->getStorage('node_type');

    $form_values['bundles'] = [];
    if (!is_null($id)) {
      $this->id = $id;

      $form['pubid'] = [
        '#type' => 'hidden',
        '#value' => $this->id,
      ];

      $publishing_option = $this->publishing_options->getPublishingOptionById($this->id);
    }

    $options = [];
    foreach ($node_types->loadMultiple() as $node_type) {
      $options[$node_type->id()] = $node_type->label();
    }

    if (!isset($form_values['title'])) {
      if (isset($publishing_option['title'])) {
        $form_values['title'] = $publishing_option['title'];
      }
      else {
        $form_values['title'] = '';
      }
    }

    if (!empty($options) && !empty($publishing_option)) {
        $form_values['bundles'] = $publishing_option['bundles'];
    }

    $form['description'] = [
      '#type' => 'html_tag',
      '#tag' => 'p',
      '#value' => $this->t('Create a publishing option and associate it to one or more existing content types.'),
    ];
    $form['title'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Publishing option title'),
      '#default_value' => $form_values['title'],
      '#required' => TRUE,
      '#description' => 'The name to display for this publishing option.',
      '#attributes' => [
        'placeholder' => t('Promote to blog')
      ],
    ];

    $form['bundles'] = [
      '#title' => $this->t('Associated node types '),
      '#type' => 'checkboxes',
      '#options' => $options,
      '#required' => TRUE,
      '#default_value' => $form_values['bundles'],
      '#description' => 'Select the node types associated with this publishing option.',
      '#description_display' => 'before'
    ];

    if(is_null($this->id)) {
      $submit_label = $this->t('Create publishing option');
    } else {
      $submit_label = $this->t('Update publishing option');
    }

    $form['actions']['submit']['#value'] = $submit_label;

    $form['actions']['cancel'] = [
      '#type' => 'submit',
      '#weight' => 10,
      '#value' => $this->t('Cancel'),
      '#limit_validation_errors' => [],
      '#submit' => ['::cancel'],
    ];

    return $form;
  }

  /**
   * {@inheritdoc)
   */
  public function cancel(array &$form, FormStateInterface $form_state) {
    $form_state->setRedirect('publishing_options.index');
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    $title = $form_state->getValue('title');
    if (strlen($title) < 3) {
      // Set an error for the form element with a key of "title".
      $form_state->setErrorByName('title', $this->t('The title must be greater than 15 characters long.'));
    }
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $form_values = $form_state->getValues();
    $this->publishing_options->insert($form_values);

    $this->messenger()->addMessage($this->t('Publishing option %title has been added.', ['%title' => $form_values['title']]));

    $form_state->setRedirect('publishing_options.index');
  }

}
