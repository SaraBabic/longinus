<?php

namespace Drupal\rest_api_authentication\Authentication\Provider;

use Drupal\rest_api_authentication\API_Authentication_Basic_Auth;
use Drupal\rest_api_authentication\API_Authentication_API_Token;
use Drupal\Core\Authentication\AuthenticationProviderInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\user\Entity\User;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;


/**
 * miniorange authentication provider.
 */
class restAPI implements AuthenticationProviderInterface {

/**
   * The module configuration.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected $config;

  /**
   * The entity manager service.
   *
   * @var \Drupal\Core\Entity\EntityTypeManager
   */
  protected $entityTypeManager;

  /**
   * Constructs a new restAPI object.
   *
   * @param \Drupal\Core\Config\ConfigFactoryInterface $config_factory
   *   The config factory service.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface $entity_type_manager
   *   The entity type manager service.
   */
  public function __construct(ConfigFactoryInterface $config_factory, EntityTypeManagerInterface $entity_type_manager) {
    $this->config = $config_factory->get('rest_api_authentication.settings');
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public function applies(Request $request) {
    $enable_authentication=\Drupal::config('rest_api_authentication.settings')->get('enable_authentication');
    if($enable_authentication == 1) {
      if (strpos($request->getRequestUri(), '/admin/config/services/jsonapi/') !== false)
        return false;
      if (strpos($request->getRequestUri(), '/jsonapi/') !== false)
        return true;
      if (strpos($request->getRequestUri(), '?_format=') !== false)
        return true;
      return false;
    }
  }

  /**
   * {@inheritdoc}
   */
  public function authenticate(Request $request) {

    $api_error = array();

    if ($request->getPathInfo() == "/user/login") {
      return null;
    }
    $authentication_method = \Drupal::config('rest_api_authentication.settings')->get('authentication_method');
    switch ($authentication_method) {
      case 0:
        $api_error = API_Authentication_Basic_Auth::validate_api_request($request);
        break;
      case 1:
        $api_error = API_Authentication_API_Token::validate_api_request($request);
        break;
      default:
        return null;
    }

    if(isset($api_error['status']) && $api_error['status'] == 'error'){

      if((isset($api_error['message']) && trim($api_error['message'])!='') || (isset($api_error['error_description']) && trim($api_error['error_description'])!='')){
        echo json_encode($api_error, JSON_PRETTY_PRINT);exit;
      }
      else{
        throw new AccessDeniedHttpException();
        return null;
      }
    }
    $account = $api_error['user'];
    $uid = $account->id();
    //    Load user storage.
    $storage = $this->entityTypeManager->getStorage('user');
    return $this->entityTypeManager
    ->getStorage('user')
    ->load($uid);
  }


  /**
   * {@inheritdoc}
   */
  public function handleException(ExceptionEvent $event) {
    $exception = $event->getThrowable();
    if ($exception instanceof AccessDeniedHttpException) {
      $event->setThrowable(new UnauthorizedHttpException('Invalid consumer origin.', $exception));
      return TRUE;
    }
    return FALSE;
  }
}
