<?php

namespace Drupal\lightgallery\Field;

/**
 * Field base.
 */
abstract class FieldBase implements FieldInterface {

  /**
   * The field name.
   *
   * @var string
   */
  protected $name;

  /**
   * The field title.
   *
   * @var string
   */
  protected $title;

  /**
   * The field type.
   *
   * @var string
   */
  protected $type;

  /**
   * The field description.
   *
   * @var string
   */
  protected $description;

  /**
   * States if the field is required or not.
   *
   * @var bool
   */
  protected $isRequired;

  /**
   * The field group.
   *
   * @var mixed
   */
  protected $group;

  /**
   * The field default value.
   *
   * @var mixed
   */
  protected $defaultValue;

  /**
   * The options.
   *
   * @var mixed
   */
  protected $options;

  /**
   * {@inheritdoc}
   */
  public function __construct() {
    $this->name = $this->setName();
    $this->title = $this->setTitle();
    $this->type = $this->setType();
    $this->description = $this->setDescription();
    $this->isRequired = $this->setIsRequired();
    $this->group = $this->setGroup();
    $this->defaultValue = $this->setDefaultValue();
    $this->options = $this->setOptions();
  }

  /**
   * {@inheritdoc}
   */
  public function getName() {
    return $this->name;
  }

  /**
   * {@inheritdoc}
   */
  public function getTitle() {
    return $this->title;
  }

  /**
   * {@inheritdoc}
   */
  public function getType() {
    return $this->type;
  }

  /**
   * {@inheritdoc}
   */
  public function getDescription() {
    return $this->description;
  }

  /**
   * {@inheritdoc}
   */
  public function isRequired() {
    return $this->isRequired;
  }

  /**
   * {@inheritdoc}
   */
  public function getGroup() {
    return $this->group;
  }

  /**
   * {@inheritdoc}
   */
  public function getDefaultValue() {
    return $this->defaultValue;
  }

  /**
   * {@inheritdoc}
   */
  public function appliesToViews() {
    return TRUE;
  }

  /**
   * {@inheritdoc}
   */
  public function getOptions() {
    return $this->options;
  }

  /**
   * {@inheritdoc}
   */
  public function appliesToFieldFormatter() {
    return TRUE;
  }

  /**
   * Sets required flag.
   */
  protected function setIsRequired() {
    return FALSE;
  }

  /**
   * Sets default value.
   */
  protected function setDefaultValue() {
    return TRUE;
  }

  /**
   * Sets options.
   */
  protected function setOptions() {
    return FALSE;
  }

  /**
   * Sets name.
   */
  abstract protected function setName();

  /**
   * Sets title.
   */
  abstract protected function setTitle();

  /**
   * Sets type.
   */
  abstract protected function setType();

  /**
   * Sets description.
   */
  abstract protected function setDescription();

  /**
   * Sets group.
   */
  abstract protected function setGroup();

}
