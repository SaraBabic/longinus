<?php

namespace Drupal\rest_api_authentication\Controller;

use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Form\FormBuilderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Controller for the rest api authentication module.
 */
class RestApiAuthenticationController extends ControllerBase {
  /**
   * The form builder.
   *
   * @var \Drupal\Core\Form\FormBuilderInterface
   */
  protected $formBuilder;

  /**
   * Constructor.
   */
  public function __construct(FormBuilderInterface $form_builder,) {
    $this->formBuilder = $form_builder;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container) {
    return new static(
      $container->get('form_builder'),
    );
  }

  /**
   * Opens the support request form in a modal dialog.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   The AJAX response.
   */
  public function openSupportRequestForm() {
    $response = new AjaxResponse();
    $modal_form = $this->formBuilder->getForm('\Drupal\rest_api_authentication\Form\MiniornageAPIAuthnRequestSupport');
    $response->addCommand(new OpenModalDialogCommand('Support Request/Contact Us', $modal_form, ['width' => '40%']));
    return $response;
  }

  /**
   * Opens the trial request form in a modal dialog.
   *
   * @return \Drupal\Core\Ajax\AjaxResponse
   *   The AJAX response.
   */
  public function openTrialRequestForm() {
    $response = new AjaxResponse();
    $modal_form = $this->formBuilder->getForm('\Drupal\rest_api_authentication\Form\MiniornageAPIAuthnRequestTrial');
    $response->addCommand(new OpenModalDialogCommand('Request 7-Days Full Feature Trial License', $modal_form, ['width' => '40%']));
    return $response;
  }

}
