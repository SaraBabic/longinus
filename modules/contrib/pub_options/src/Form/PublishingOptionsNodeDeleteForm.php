<?php

namespace Drupal\publishing_options\Form;

use Drupal\node\Form\NodeDeleteForm;

/**
 * Provides a form for deleting a node.
 *
 * @internal
 */
class PublishingOptionsNodeDeleteForm extends NodeDeleteForm {

  /**
   * {@inheritdoc}
   */
  protected function getDeletionMessage() {
    /** @var \Drupal\node\NodeInterface $entity */
    $entity = $this->getEntity();

    $node_type_storage = $this->entityTypeManager->getStorage('node_type');
    $node_type = $node_type_storage->load($entity->bundle())->label();

    if (!$entity->isDefaultTranslation()) {
      return $this->t(
            '@language translation of the @type %label has been deleted.', [
              '@language' => $entity->language()->getName(),
              '@type' => $node_type,
              '%label' => $entity->label(),
            ]
        );
    }

    return $this->t(
          'The @type %title has been deleted.', [
            '@type' => $node_type,
            '%title' => $this->getEntity()->label(),
          ]
      );
  }

  /**
   * {@inheritdoc}
   */
  protected function logDeletionMessage() {
    /** @var \Drupal\node\NodeInterface $entity */
    $entity = $this->getEntity();
    $this->logger('content')->notice('@type: deleted %title.', ['@type' => $entity->getType(), '%title' => $entity->label()]);
  }

}
