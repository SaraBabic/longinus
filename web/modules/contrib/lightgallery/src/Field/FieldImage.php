<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field image.
 */
class FieldImage extends FieldBase {

  /**
   * {@inheritdoc}
   */
  public function appliesToFieldFormatter() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  protected function setIsRequired() {
    return TRUE;
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
    return [
      'Drupal\lightgallery\Plugin\views\style\LightGallery',
      'getImageFields',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'image_field';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Image field';
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
    return 'Select the field you want to use to display the images in the Lightgallery.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
