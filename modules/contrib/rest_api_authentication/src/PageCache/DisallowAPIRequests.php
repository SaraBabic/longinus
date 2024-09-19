<?php

namespace Drupal\rest_api_authentication\PageCache;

use Drupal\Core\PageCache\RequestPolicyInterface;
use Symfony\Component\HttpFoundation\Request;

/**
 * Cache policy for pages served from rest api authentication.
 *
 * This policy disallows caching of requests that use
 * rest_api_authentication for security reasons.
 * Otherwise responses for authenticated requests can get into the
 * page cache and could be delivered to unprivileged users.
 */
class DisallowAPIRequests implements RequestPolicyInterface {

  /**
   * {@inheritdoc}
   */
  public function check(Request $request) {
    if (strpos($request->getRequestUri(), '/jsonapi/') !== FALSE) {
      return self::DENY;
    }
    if (strpos($request->getRequestUri(), '?_format=') !== FALSE) {
      return self::DENY;
    }
  }

}
