<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryZoom;

/**
 * Field scale.
 */
class FieldScale extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setDefaultValue() {
    return 1;
  }

  /**
   * {@inheritdoc}
   */
  protected function setOptions() {
    return [
      'Drupal\lightgallery\Manager\LightgalleryManager',
      'getScaleOptions',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'scale';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Scale';
  }

  /**
   * {@inheritdoc}
   */
  protected function setType() {
    return FieldTypesEnum::SELECT;
  }

  /**
   * {@inheritdoc}
   */
  protected function setDescription() {
    return 'Value of zoom that should be incremented/decremented.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryZoom();
  }

}
