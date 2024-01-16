<?php

namespace Drupal\publishing_options\Form;

use Drupal\Core\Entity\EntityFieldManagerInterface;
use Drupal\node\NodeTypeForm;
use Drupal\Core\Form\FormStateInterface;
use Drupal\publishing_options\Services\PublishingOptionsContent;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Database\Connection;

/**
 *
 */
class PublishingOptionsNodeTypeForm extends NodeTypeForm {

  /**
   * The database connection.
   *
   * @var \Drupal\Core\Database\Connection
   */
  protected $connection;

  /**
   * Publishing options service.
   *
   * @var array
   */
  protected $publishing_options;
  /**
   * The entity manager.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityManager;

  /**
   * The bundles.
   *
   * @var \Drupal\publishing_options\Services\PublishingOptionsContent
   */
  protected $bundles;

  /**
   * Construct the new form object.
   *
   * @param \Drupal\publishing_options\Services\PublishingOptionsContent $publishing_options
   *   The publishing options service.
   */
  public function __construct(EntityFieldManagerInterface $entity_manager, PublishingOptionsContent $publishing_options,  Connection $connection) {
    parent::__construct($entity_manager);
    $this->entityManager = $entity_manager;
    $this->publishing_options = $publishing_options;
    $this->connection = $connection;
  }

  /**
   * {@inheritdoc}
   *
   * We'll use the ContainerInjectionInterface pattern here to inject the
   * current user and also get the string_translation service.
   */
  public static function create(ContainerInterface $container) {
    $form = new static(
      $container->get('entity_field.manager'),
      $container->get('publishing_options.content'),
      $container->get('database')
    );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $form = parent::form($form, $form_state);

    $type = $this->entity;

    $publishing_options = $this->publishing_options->getPublishingOptions();

    $this->bundles = $this->publishing_options->getPublishingOptionBundles($type->id());

    foreach ($publishing_options as $publishing_option) {
      if (isset($publishing_option->pubid)) {
        // Create drupal machine name for publishing option.
        $machine_name = strtolower(str_replace(' ', '_', $publishing_option->title));

        $form['workflow']['options']['#options'][$machine_name] = $publishing_option->title;

        foreach ($this->bundles as $bundle) {
          if ($publishing_option->pubid == $bundle->pubid) {
            $form['workflow']['options']['#default_value'][$machine_name] = $machine_name;
          }
        }
      }

    }

    return $this->protectBundleIdElement($form);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    $type = $this->entity;

    $options = $form_state->getValue('options');
    $remove = ['sticky', 'status', 'promote', 'revision'];
    $options = array_flip(array_diff(array_flip($options), $remove));

    // Check and see if checkbox has been clicked.
    // If it has, associate pub option to entity type
    foreach ($options as $id => $option) {
      $publishing_option = $this->publishing_options->getPublishingOptionByTitle($id);
      if ((bool) $form_state->getValue('options')[$id]) {
        $this->publishing_options->insertBundle($publishing_option->pubid, $type->id());
      }
      elseif ($this->publishing_options->getPublishingOptionBundles($type->id(), $publishing_option->pubid)) {
        $this->publishing_options->deleteBundle($publishing_option->pubid, $type->id());
      }
    }

    parent::save($form, $form_state);
  }
}
