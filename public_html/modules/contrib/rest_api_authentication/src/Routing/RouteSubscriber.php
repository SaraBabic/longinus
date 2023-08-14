<?php

namespace Drupal\rest_api_authentication\Routing;

use Drupal\Core\Routing\RouteSubscriberBase;
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

/**
 * Listens to the dynamic route events.
 */
class RouteSubscriber extends RouteSubscriberBase {
  /**
   * {@inheritdoc}
   */
  protected function alterRoutes(RouteCollection $collection) {
    $route_login = $collection->get('user.login.http');
    $route_login->addOptions([
      '_auth' => [
        'rest_api_authentication'
      ],
    ]);
  }

  /**
   * @param Route $route
   *
   * @return false|true
   */
  private function restLoginRount(Route $route) {
    $path = $route->getPath();
    return strpos($path,'/user/login?_format=');
  }
}
