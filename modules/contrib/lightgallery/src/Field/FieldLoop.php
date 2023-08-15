<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field loop.
 */
class FieldLoop extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'loop';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Loop';
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
    return 'If not selected, the ability to loop back to the beginning of the gallery when on the last element, will be disabled.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
