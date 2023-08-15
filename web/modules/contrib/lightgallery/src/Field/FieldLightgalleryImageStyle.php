<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field light gallery image style.
 */
class FieldLightgalleryImageStyle extends FieldBase {

  /**
   * {@inheritdoc}
   */
  public function appliesToViews() {
    return FALSE;
  }

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
    return ['Drupal\lightgallery\Manager\LightgalleryManager', 'getImageStyles'];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'lightgallery_image_style';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Lightgallery image style';
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
    return 'The image style used when viewing the lightgallery.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
