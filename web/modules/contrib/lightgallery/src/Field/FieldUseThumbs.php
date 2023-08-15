<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryThumbs;

/**
 * Field use thumbs.
 */
class FieldUseThumbs extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'thumbnails';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Use thumbnails';
  }

  /**
   * {@inheritdoc}
   */
  protected function setType() {
    return FieldTypesEnum::CHECKBOX;
  }

  /**
   * {@inheritdoc}
   */
  protected function setDescription() {
    return 'Indicate if you want to use thumbnails in the LightGallery.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryThumbs();
  }

}
