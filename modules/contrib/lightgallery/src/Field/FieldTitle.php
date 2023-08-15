<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field title.
 */
class FieldTitle extends FieldBase {

  /**
   * {@inheritdoc}
   */
  public function appliesToFieldFormatter() {
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
    return [
      'Drupal\lightgallery\Plugin\views\style\LightGallery',
      'getNonImageFields',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'title';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Title field';
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
    return 'Select the field you want to use as title in the Lightgallery. Leave empty to omit titles.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
