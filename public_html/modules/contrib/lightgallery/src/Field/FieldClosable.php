<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field closable.
 */
class FieldClosable extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'closable';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Closable';
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
    return 'Allows clicks on dimmer to close gallery.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
