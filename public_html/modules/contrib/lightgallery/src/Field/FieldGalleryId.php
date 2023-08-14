<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryHash;

/**
 * Field gallery id.
 */
class FieldGalleryId extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setDefaultValue() {
    return 1;
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'gallery_id';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Gallery ID';
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
    return 'Unique id for each gallery. It is mandatory when you use hash plugin for multiple galleries on the same page.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryHash();
  }

}
