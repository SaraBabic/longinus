<?php

namespace Drupal\lightgallery\Group;

use Drupal\lightgallery\Field\FieldFullscreen;

/**
 * Group light gallery full screen.
 */
class GroupLightgalleryFullScreen extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_FULL_SCREEN;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery fullscreen settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    /** @var \Drupal\lightgallery\Field\FieldInterface $field */
    $field = new FieldFullscreen();
    return $field->getName();
  }

}
