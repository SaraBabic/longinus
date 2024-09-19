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
        'rest_api_authentication',
      ],
    ]);
  }

  /**
   * Checks if the given route is for the REST login.
   *
   * @param \Symfony\Component\Routing\Route $route
   *   The route to check.
   *
   * @return bool
   *   TRUE if the route is for the REST login, FALSE otherwise.
   */
  private function restLoginRount(Route $route) {
    $path = $route->getPath();
    return strpos($path, '/user/login?_format=');
  }

}
