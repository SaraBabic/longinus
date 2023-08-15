<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryHash;

/**
 * Field hash.
 */
class FieldHash extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'hash';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Hash';
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
    return 'Enable/Disable hash option.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryHash();
  }

}
