<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field esc key.
 */
class FieldEscKey extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'esc_key';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Escape key';
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
    return 'Whether the LightGallery could be closed by pressing the "Esc" key.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
