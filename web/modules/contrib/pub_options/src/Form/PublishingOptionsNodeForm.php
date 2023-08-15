<?php

namespace Drupal\publishing_options\Form;

use Drupal\Component\Datetime\TimeInterface;
use Drupal\Core\Datetime\DateFormatterInterface;
use Drupal\node\NodeForm;
use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Entity\EntityTypeBundleInfoInterface;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Session\AccountInterface;
use Drupal\Core\TempStore\PrivateTempStoreFactory;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\publishing_options\Services\PublishingOptionsContent;

/**
 * Form handler for the node edit forms.
 *
 * @internal
 */
class PublishingOptionsNodeForm extends NodeForm {

  /**
   * The tempstore factory.
   *
   * @var \Drupal\Core\TempStore\PrivateTempStoreFactory
   */
  protected $tempStoreFactory;

  /**
   * The Current User object.
   *
   * @var \Drupal\Core\Session\AccountInterface
   */
  protected $currentUser;

  /**
   * Publishing options service.
   */
  protected $publishing_options;

  /**
   * Constructs a NodeForm object.
   *
   * @param \Drupal\Core\Entity\EntityRepositoryInterface $entity_repository
   *   The entity repository.
   * @param \Drupal\Core\TempStore\PrivateTempStoreFactory $temp_store_factory
   *   The factory for the temp store object.
   * @param \Drupal\Core\Entity\EntityTypeBundleInfoInterface $entity_type_bundle_info
   *   The entity type bundle service.
   * @param \Drupal\Component\Datetime\TimeInterface $time
   *   The time service.
   * @param \Drupal\Core\Session\AccountInterface $current_user
   *   The current user.
   */
  public function __construct(EntityRepositoryInterface $entity_repository, PrivateTempStoreFactory $temp_store_factory, EntityTypeBundleInfoInterface $entity_type_bundle_info = NULL, TimeInterface $time = NULL, AccountInterface $current_user, DateFormatterInterface $date_formatter, PublishingOptionsContent $publishing_options) {
    parent::__construct($entity_repository, $temp_store_factory, $entity_type_bundle_info, $time, $current_user, $date_formatter);
    $this->tempStoreFactory = $temp_store_factory;
    $this->currentUser = $current_user;
    $this->dateFormatter = $date_formatter;
    $this->publishing_options = $publishing_options;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
          $container->get('entity.repository'),
          $container->get('tempstore.private'),
          $container->get('entity_type.bundle.info'),
          $container->get('datetime.time'),
          $container->get('current_user'),
          $container->get('date.formatter'),
          $container->get('publishing_options.content')
      );
  }

  /**
   * {@inheritdoc}
   */
  public function form(array $form, FormStateInterface $form_state) {
    $node = $this->entity;

    $type = $node->getType();

    // Get all publishing types available by this entity type.
    $publishing_options = $this->publishing_options->getPublishingOptions();

    // Check to see that publishing types are allowed for this entity.
    foreach ($publishing_options as $publishing_option) {
      if (isset($publishing_option->pubid)) {
        // Get publishing option associated with bundle.
        $allowed_publishing_option = $this->publishing_options->getPublishingOptionBundles($type, $publishing_option->pubid);

        // Create drupal machine name for publishing option.
        $machine_name = strtolower(str_replace(' ', '_', $publishing_option->title));
      }
      else {
        $allowed_publishing_option = FALSE;
      }
      // If allowed publishing option returns a value.
      if ((bool) $allowed_publishing_option) {
        // Get the node if it has bundle association.
        $node_association_exists = $this->publishing_options->getNode($node->id(), $publishing_option->pubid);

        // Check if this node is already related to publishing option.
        if (isset($node_association_exists->selected)) {
          // If node is associated to publishing option, get selected state.
          $value = (bool) $node_association_exists->selected;
        }
        else {
          $value = (bool) false;
        }

        $form[$machine_name] = [
          '#type' => 'checkbox',
          '#title' => $this->t($publishing_option->title),
          '#default_value' => $value,
        ];

        $form[$machine_name]['#group'] = 'options';
      }
    }

    return parent::form($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function save(array $form, FormStateInterface $form_state) {
    parent::save($form, $form_state);

    // Get node entry.
    $node = $this->entity;

    // Get all publishing types available by this entity type.
    $publishing_options = $this->publishing_options->getPublishingOptions();

    // Iterate through all publishing options.
    foreach ($publishing_options as $publishing_option) {
      // Get machine name of publsihing option.
      $machine_name = strtolower(str_replace(' ', '_', $publishing_option->title));

      // Get publishing option form state.
      $form_value = $form_state->getValue($machine_name);

      // If the form value is not null ...
      if (!is_null($form_value)) {
        // Upsert publishing option.
        $this->publishing_options->upsertOptionNodeSelection($node->id(), $publishing_option->pubid, $form_value);
      }
    }
  }

}
