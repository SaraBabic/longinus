<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryAutoplay;

/**
 * Field autoplay.
 */
class FieldAutoplay extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'autoplay';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Autoplay';
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
    return 'Enable/Disable gallery autoplay.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryAutoplay();
  }

}
