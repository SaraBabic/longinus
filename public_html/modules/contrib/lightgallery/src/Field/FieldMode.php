<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field mode.
 */
class FieldMode extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setDefaultValue() {
    return NULL;
  }

  /**
   * {@inheritdoc}
   */
  protected function setOptions() {
    return [
      'Drupal\lightgallery\Manager\LightgalleryManager',
      'getLightgalleryModes',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'mode';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Transition';
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
    return 'Type of transition between images.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
