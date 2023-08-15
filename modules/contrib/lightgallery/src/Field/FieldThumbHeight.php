<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryThumbs;

/**
 * Field thumb height.
 */
class FieldThumbHeight extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setDefaultValue() {
    return 100;
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'thumb_cont_height';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Height';
  }

  /**
   * {@inheritdoc}
   */
  protected function setType() {
    return FieldTypesEnum::TEXTFIELD;
  }

  /**
   * {@inheritdoc}
   */
  protected function setDescription() {
    return 'Height of the thumbnail container including padding and border.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryThumbs();
  }

}
