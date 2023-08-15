<?php

namespace Drupal\publishing_options\Form;

use Drupal\Core\Form\ConfirmFormBase;
use Drupal\Core\Form\FormStateInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Drupal\publishing_options\Services\PublishingOptionsContent;
use Drupal\Core\Url;

/**
 * Builds the form to delete a path alias.
 *
 * @internal
 */
class PublishingOptionsDeleteForm extends ConfirmFormBase {

  /**
   * Publishing option id.
   */
  protected $id;

  /**
   * Publishing options service.
   */
  protected $publishing_options;

  /**
   * Construct the new form object.
   *
   * @param \Drupal\publishing_options\Services\PublishingOptionsContent $publishing_options
   *   The publishing options service.
   */
  public function __construct(PublishingOptionsContent $publishing_options) {
    $this->publishing_options = $publishing_options;
  }

  /**
   * {@inheritdoc}
   *
   * We'll use the ContainerInjectionInterface pattern here to inject the
   * current user and also get the string_translation service.
   */
  public static function create(ContainerInterface $container) {
    $form = new static(
          $container->get('publishing_options.content')
      );

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'publishing_options_delete_form';
  }

  /**
   * {@inheritdoc}
   */
  public function getQuestion() {
    return $this->t('Are you sure you want to delete "@title"', ['@title' => $this->publishing_options->title($this->id)]);
  }

  /**
   * Gather the confirmation text.
   *
   * The confirm text is used as the text in the button that confirms the
   * question posed by getQuestion().
   *
   * @return string
   *   Translated string.
   */
  public function getConfirmText() {
    return $this->t('Delete @title', ['@title' => $this->publishing_options->title($this->id)]);
  }

  /**
   * {@inheritdoc}
   */
  public function getCancelUrl() {
    return new Url('publishing_options.index');
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state, $id = NULL) {
    $this->id = $id;

    $form = parent::buildForm($form, $form_state);

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    \Drupal::messenger()->addStatus(
          $this->t(
              'The publishing option %title has been deleted.',
              ['%title' => $this->publishing_options->title($this->id)]
          )
      );

    $this->logger('publishing_option')
      ->notice(
              'publishing_option: deleted %title and all its associated content relationships.',
              ['%title' => $this->publishing_options->title($this->id)]
          );

    $this->publishing_options->delete(['pubid' => $this->id]);

    $form_state->setRedirect('publishing_options.index');
  }

}
