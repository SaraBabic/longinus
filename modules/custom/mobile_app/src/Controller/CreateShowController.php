<?php

namespace Drupal\mobile_app\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\rest\ResourceResponse;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller for creating a show.
 */
class CreateShowController extends ControllerBase {

  /**
   * Creates a node.
   */
  public function createShows(Request $request) {
    $data = json_decode($request->getContent(), TRUE);

    if (!empty($data['title']) && !empty($data['body']) && !empty($data['field_city']) && !empty($data['field_country'])) {
      $show = [
        'title' => $data['title'],
        'body' => $data['body'],
        'field_city' => $data['field_city'],
        'field_country' => $data['field_country'],
        'field_date' => $data['field_date'],
        'field_end_date' => $data['field_end_date'],
      ];
      $newShowNode = $this->createShow($show);

      return new JsonResponse(['message' => 'Successfully created a new Show!']);
    }
    else {
      return new JsonResponse(['error' => 'All fields are required!'], 400);
    }
  }

  protected function createShow($show) {
    $new_show = Node::create(['type' => 'show']);
    $new_show->set('title', $show['title']);
    $new_show->set('body', $show['body']);
    $new_show->set('field_city', $show['field_city']);
    $new_show->set('field_country', $show['field_country']);
    $new_show->set('field_date', $show['field_date']);
    $new_show->set('field_end_date', $show['field_end_date']);
    $new_show->enforceIsNew();
    $new_show->save();
    return true;
  }
}
