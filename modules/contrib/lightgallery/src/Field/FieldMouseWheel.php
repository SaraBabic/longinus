<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field mouse wheel.
 */
class FieldMouseWheel extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'mouse_wheel';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Mouse wheel';
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
    return 'Change slide on mousewheel.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
