<?php

namespace Drupal\rest_api_authentication\Authentication\Provider;

use Drupal\Component\Plugin\Exception\InvalidPluginDefinitionException;
use Drupal\Component\Plugin\Exception\PluginNotFoundException;
use Drupal\Core\Authentication\AuthenticationProviderInterface;
use Drupal\Core\Config\ConfigFactoryInterface;
use Drupal\Core\Config\ImmutableConfig;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\rest_api_authentication\ApiAuthenticationApiToken;
use Drupal\rest_api_authentication\ApiAuthenticationBasicAuth;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Symfony\Component\HttpKernel\Exception\UnauthorizedHttpException;

/**
 * Miniorange authentication provider.
 */
class RestAPI implements AuthenticationProviderInterface {

  /**
   * The module configuration.
   *
   * @var \Drupal\Core\Config\ImmutableConfig
   */
  protected ImmutableConfig $config;

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
    $enable_authentication = $this->config->get('enable_authentication');
    if ($enable_authentication == 1) {
      if (strpos($request->getRequestUri(), '/admin/config/services/jsonapi/') !== FALSE) {
        return FALSE;
      }
      if (strpos($request->getRequestUri(), '/jsonapi/') !== FALSE) {
        return TRUE;
      }
      if (strpos($request->getRequestUri(), '?_format=') !== FALSE) {
        return TRUE;
      }
      return FALSE;
    }
    return FALSE;
  }

  /**
   * {@inheritdoc}
   */
  public function authenticate(Request $request) {

    $api_error = [];

    if ($request->getPathInfo() == "/user/login") {
      return NULL;
    }
    $authentication_method = $this->config->get('authentication_method');
    switch ($authentication_method) {
      case 0:
        $api_error = ApiAuthenticationBasicAuth::validateApiRequest($request);
        break;

      case 1:
        $api_error = ApiAuthenticationApiToken::validateApiRequest($request);
        break;

      default:
        return NULL;
    }

    if (isset($api_error['status']) && $api_error['status'] == 'error') {

      if ((isset($api_error['message']) && trim($api_error['message']) != '') || (isset($api_error['error_description']) && trim($api_error['error_description']) != '')) {
        echo json_encode($api_error, JSON_PRETTY_PRINT);
        http_response_code($api_error['http_code']);
        exit;
      }
      else {
        throw new AccessDeniedHttpException();
      }
    }
    $account = $api_error['user'];
    $uid = $account->id();
    // Load user storage.
    try {
      return $this->entityTypeManager
        ->getStorage('user')
        ->load($uid);
    }
    catch (InvalidPluginDefinitionException | PluginNotFoundException $e) {
      return NULL;
    }
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
