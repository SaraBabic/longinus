<?php

namespace Drupal\lightgallery\Group;

use Drupal\lightgallery\Field\FieldPager;

/**
 * Group light gallery pager.
 */
class GroupLightgalleryPager extends GroupBase {

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return GroupsEnum::LIGHTGALLERY_PAGER;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return 'Lightgallery pager settings';
  }

  /**
   * {@inheritdoc}
   */
  public function getOpenValue() {
    /** @var \Drupal\lightgallery\Field\FieldInterface $field */
    $field = new FieldPager();
    return $field->getName();
  }

}
