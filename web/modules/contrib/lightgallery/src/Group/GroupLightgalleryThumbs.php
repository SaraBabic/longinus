<?php

namespace Drupal\lightgallery\Group;

use Drupal\lightgallery\Field\FieldUseThumbs;

/**
 * Group light gallery thumbs.
 */
class GroupLightgalleryThumbs extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_THUMBS;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery thumbnail settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    /** @var \Drupal\lightgallery\Field\FieldInterface $field */
    $field = new FieldUseThumbs();
    return $field->getName();
  }

}
