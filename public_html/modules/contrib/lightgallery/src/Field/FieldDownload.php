<?php

namespace Drupal\lightgallery\Field;

use Drupal\lightgallery\Group\GroupLightgalleryCore;

/**
 * File download.
 */
class FieldDownload extends FieldBase {

  /**
   * {@inheritdoc}
   */
  protected function setName() {
    return 'download';
  }

  /**
   * {@inheritdoc}
   */
  protected function setTitle() {
    return 'Download';
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
    return 'Enable download button. '
    . 'By default download url will be taken from data-src/href attribute but it supports only for modern browsers.';
  }

  /**
   * {@inheritdoc}
   */
  protected function setGroup() {
    return new GroupLightgalleryCore();
  }

}
