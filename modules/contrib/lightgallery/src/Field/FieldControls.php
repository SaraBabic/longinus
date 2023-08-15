<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * Field controls.
 */
class FieldControls extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'controls';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Controls';
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
    return 'If not checked, prev/next buttons will not be displayed.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
