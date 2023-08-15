<?php

namespace Drupal\lightgallery\Group;

use Drupal\lightgallery\Field\FieldAutoplay;

/**
 * Group light gallery autoplay.
 */
class GroupLightgalleryAutoplay extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_AUTOPLAY;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery autoplay settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    /** @var \Drupal\lightgallery\Field\FieldInterface $field */
    $field = new FieldAutoplay();
    return $field->getName();
  }

}
