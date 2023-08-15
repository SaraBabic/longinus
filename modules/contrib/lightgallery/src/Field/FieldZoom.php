<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryZoom;

/**
 * Field zoom.
 */
class FieldZoom extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'zoom';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Zoom';
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
    return 'Enable/Disable zoom option.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryZoom();
  }

}
