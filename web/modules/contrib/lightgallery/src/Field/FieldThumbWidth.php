<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryThumbs;

/**
 * Field thumb width.
 */
class FieldThumbWidth extends FieldBase {

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
    return 'thumb_width';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Width';
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
    return 'Width of each thumbnail.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryThumbs();
  }

}
