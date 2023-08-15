<?php

namespace Drupal\lightgallery\Group;

use Drupal\lightgallery\Field\FieldHash;

/**
 * Group light gallery hash.
 */
class GroupLightgalleryHash extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_HASH;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery hash settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    /** @var \Drupal\lightgallery\Field\FieldInterface $field */
    $field = new FieldHash();
    return $field->getName();
  }

}
