<?php
/**
 * @file
 * Contains \Drupal\rest_api_authentication\Controller\DefaultController.
 */

namespace Drupal\rest_api_authentication\Controller;
use Drupal\Core\Ajax\AjaxResponse;
use Drupal\Core\Ajax\OpenModalDialogCommand;
use Drupal\Core\Controller\ControllerBase;
use Drupal\rest_api_authentication\Utilities;
use Exception;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Drupal\rest_api_authentication\MiniorangeApiAuthConstants;
use function Symfony\Component\VarDumper\Dumper\esc;
use GuzzleHttp\Client;

class rest_api_authenticationController extends ControllerBase {
  /**
   * @return \Drupal\Core\Ajax\AjaxResponse
   */
  public function openSupportRequestForm() {
    $response = new AjaxResponse();
    $modal_form = \Drupal::formBuilder()->getForm('\Drupal\rest_api_authentication\Form\MiniornageAPIAuthnRequestSupport');
    $response->addCommand(new OpenModalDialogCommand('Support Request/Contact Us', $modal_form, ['width' => '40%']));
    return $response;
  }

  /**
   * @return \Drupal\Core\Ajax\AjaxResponse
   */
  public function openTrialRequestForm() {
    $response = new AjaxResponse();
    $modal_form = \Drupal::formBuilder()->getForm('\Drupal\rest_api_authentication\Form\MiniornageAPIAuthnRequestTrial');
    $response->addCommand(new OpenModalDialogCommand('Request 7-Days Full Feature Trial License', $modal_form, ['width' => '40%']));
    return $response;
  }

 }
