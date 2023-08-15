<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryAutoplay;

/**
 * Field pause.
 */
class FieldPause extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setDefaultValue() {
    return 5000;
  }

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'pause';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Pause';
  }

  /**
   * {@inheritdoc}
   */
  protected function setType() {
    return FieldTypesEnum::TEXTFIELD;
  }

  /**
   * {@inheritdoc}
   */
  protected function setDescription() {
    return 'The time (in ms) between each auto transition.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryAutoplay();
  }

}
