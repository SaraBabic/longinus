<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field counter.
 */
class FieldCounter extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'counter';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Counter';
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
    return 'Whether to show total number of images and index number of currently displayed image.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
