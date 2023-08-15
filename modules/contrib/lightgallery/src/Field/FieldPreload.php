<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field pre load.
 */
class FieldPreload extends FieldBase {

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
      'getPreloadOptions',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'preload';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Preload';
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
    return 'number of preload slides. will exicute only after the current slide is fully loaded. '
    . 'ex:// you clicked on 4th image and if preload = 1 then 3rd slide and 5th slide will be loaded in the background after the 4th slide is fully loaded. '
    . 'If preload is 2 then 2nd 3rd 5th 6th slides will be preloaded.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
