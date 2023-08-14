<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryPager;

/**
 * Field Pager.
 */
class FieldPager extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'pager';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Pager';
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
    return 'Enable/Disable pager.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryPager();
  }

}
