<?php

namespace Drupal\publishing_options\Form;

use Drupal\node\Form\NodeTypeDeleteConfirm;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\publishing_options\Services\PublishingOptionsContent;

/**
 * Provides a form for content type deletion.
 *
 * @internal
 */
class PublishingOptionsNodeTypeDeleteConfirm extends NodeTypeDeleteConfirm {

  /**
   * Publishing options service.
   */
  protected $publishing_options;

  /**
   * Construct the new form object.
   *
   * @param \Drupal\publishing_options\Services\PublishingOptionsContent $publishing_options
   *   The publishing options service.
   */
  public function __construct(PublishingOptionsContent $publishing_options) {
    $this->publishing_options = $publishing_options;
  }

  /**
   * {@inheritdoc}
   *
   * We'll use the ContainerInjectionInterface pattern here to inject the
   * current user and also get the string_translation service.
   */
  public static function create(ContainerInterface $container) {
    $form = new static(
          $container->get('publishing_options.content')
      );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = parent::buildForm($form, $form_state);

    $type = $this->entity;

    // Get the publishing options by bundle.
    $bundles = $this->publishing_options->getPublishingOptionBundles($type->id());

    foreach ($bundles as $bundle) {
      // Delete publishing options bundle entries.
      $this->publishing_options->deleteBundle($bundle->pubid, $bundle->bundle);
    }

    return parent::buildForm($form, $form_state);
  }

}
