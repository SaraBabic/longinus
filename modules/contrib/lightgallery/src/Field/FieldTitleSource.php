<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field title source.
 */
class FieldTitleSource extends FieldBase {

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
    return [
      'Drupal\lightgallery\Manager\LightgalleryManager',
      'getImageSourceFields',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'title_source';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Title source';
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
    return 'The image value that should be used for the title.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
