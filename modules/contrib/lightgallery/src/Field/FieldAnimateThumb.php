<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryThumbs;

/**
 * Field animate thumb.
 */
class FieldAnimateThumb extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'animate_thumb';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Animate thumbnails';
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
    return 'Enable thumbnail animation.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryThumbs();
  }

}
