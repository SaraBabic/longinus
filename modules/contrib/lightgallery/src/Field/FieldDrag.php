<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field drag.
 */
class FieldDrag extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'drag';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Drag';
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
    return 'Enables desktop mouse drag support.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
