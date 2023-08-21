<?php

namespace Drupal\mobile_app\Controller;

use Drupal\Core\Controller\ControllerBase;
use Drupal\rest\ResourceResponse;
use Drupal\node\Entity\Node;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\JsonResponse;

/**
 * Controller for creating a blog.
 */
class CreateBlogController extends ControllerBase {

  /**
   * Creates a node.
   */
  public function createBlogs(Request $request) {
    $data = json_decode($request->getContent(), TRUE);

    if (!empty($data['title']) && !empty($data['body'])) {
      $article = [
        'title' => $data['title'],
        'body' => $data['body'],
      ];
      $newArticleNode = $this->createBlog($article);

      return new JsonResponse(['message' => 'Successfully created a new Blog!']);
    }
    else {
      return new JsonResponse(['error' => 'Title and body are required!'], 400);
    }
  }

  protected function createBlog($article) {
    $new_article = Node::create(['type' => 'blog']);
    $new_article->set('title', $article['title']);
    $new_article->set('body', $article['body']);
    $new_article->enforceIsNew();
    $new_article->save();
    return true;
  }
}
