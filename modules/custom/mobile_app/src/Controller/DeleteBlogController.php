<?php

namespace Drupal\mobile_app\Controller;

use Drupal\Component\DependencyInjection\ContainerInterface;
use Drupal\Core\Controller\ControllerBase;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller for deleting a blog node.
 */
class DeleteBlogController extends ControllerBase {

  protected $entityTypeManager;

  public function __construct(EntityTypeManagerInterface $entityTypeManager) {
    $this->entityTypeManager = $entityTypeManager;
  }

  public static function create(ContainerInterface|\Symfony\Component\DependencyInjection\ContainerInterface $container) {
    return new static(
      $container->get('entity_type.manager'),
    );

  }

  /**
   * Deletes a blog node.
   */
  public function deleteBlog(Request $request, $nid) {

      try {
        $nid->delete();
        return new JsonResponse(['message' => 'Node deleted successfully.']);
      } catch (\Exception $e) {
        return new JsonResponse(['error' => 'An error occurred while deleting the node.'], 500);
      }
    }


}
