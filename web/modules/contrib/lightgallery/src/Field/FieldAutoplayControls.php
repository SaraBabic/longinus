<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryAutoplay;

/**
 * Field autoplay controls.
 */
class FieldAutoplayControls extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'autoplay_controls';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Autoplay controls';
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
    return 'Show/hide autoplay controls.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryAutoplay();
  }

}
