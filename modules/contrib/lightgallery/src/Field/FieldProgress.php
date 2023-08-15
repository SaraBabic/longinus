<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryAutoplay;

/**
 * Field progress.
 */
class FieldProgress extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'progress_bar';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Progress bar';
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
    return 'Enable/Disable autoplay progress bar.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryAutoplay();
  }

}
