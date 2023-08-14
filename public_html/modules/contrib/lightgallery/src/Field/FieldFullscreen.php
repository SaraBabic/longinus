<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryFullScreen;

/**
 * Field full screen.
 */
class FieldFullscreen extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'full_screen';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Full screen';
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
    return 'Enable/Disable fullscreen mode.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryFullScreen();
  }

}
