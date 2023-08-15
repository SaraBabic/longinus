<?php

namespace Drupal\lightgallery\Group;

/**
 * Group base.
 */
abstract class GroupBase implements GroupInterface {

  /**
   * {@inheritdoc}
   */
  public function isOpen() {
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    return FALSE;
  }

}
