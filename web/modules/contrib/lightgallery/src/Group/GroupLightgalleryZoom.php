<?php

namespace Drupal\lightgallery\Group;

use Drupal\lightgallery\Field\FieldZoom;

/**
 * Group light gallery zoom.
 */
class GroupLightgalleryZoom extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_ZOOM;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery zoom settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    /** @var \Drupal\lightgallery\Field\FieldInterface $field */
    $field = new FieldZoom();
    return $field->getName();
  }

}
