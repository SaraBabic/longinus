<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field touch.
 */
class FieldTouch extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'touch';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Touch';
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
    return 'Enables touch support.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
