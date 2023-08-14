<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryThumbs;

/**
 * Field current pager position.
 */
class FieldCurrentPagerPosition extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setDefaultValue() {
    return 'middle';
  }

  /**
   * {@inheritdoc}
   */
  protected function setOptions() {
    return [
      'Drupal\lightgallery\Manager\LightgalleryManager',
      'getCurrentPagerPositionOptions',
    ];
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'current_pager_position';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Position';
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
    return 'Position of selected thumbnail.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryThumbs();
  }

}
