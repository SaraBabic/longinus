<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field key press.
 */
class FieldKeyPress extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'key_press';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Keyboard';
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
    return 'Enable keyboard navigation.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
