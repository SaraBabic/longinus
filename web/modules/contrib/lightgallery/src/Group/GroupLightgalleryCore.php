<?php

namespace Drupal\lightgallery\Group;

/**
 * Group light gallery core.
 */
class GroupLightgalleryCore extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_CORE;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery core settings';
  }

  /**
   * {@inheritdoc}
   */
  public function isOpen() {
    return TRUE;
  }

}
