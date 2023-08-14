<?php

namespace Drupal\cheeseburger_menu\Cache;

use Drupal\Core\Cache\CacheableMetadata;
use Drupal\Core\Cache\Context\CacheContextInterface;
use Drupal\Core\Entity\EntityTypeManagerInterface;
use Drupal\Core\Routing\RouteMatchInterface;
use Drupal\taxonomy\TermInterface;
use Symfony\Component\DependencyInjection\ContainerAwareInterface;
use Symfony\Component\DependencyInjection\ContainerAwareTrait;

/**
 * Defines the TaxonomyTermTreeCache service.
 *
 * Cache context ID: 'route.taxonomy_term_tree'.
 *
 * This cache context will create context only if current route is taxonomy term
 *   otherwise it will return none.
 */
class TaxonomyTermTreeCacheContext implements CacheContextInterface, ContainerAwareInterface {

  use ContainerAwareTrait;

  /**
   * The current route match.
   *
   * @var \Drupal\Core\Routing\RouteMatchInterface
   */
  protected $routeMatch;

  /**
   * Drupal\Core\Entity\EntityTypeManagerInterface definition.
   *
   * @var \Drupal\Core\Entity\EntityTypeManagerInterface
   */
  protected $entityTypeManager;

  /**
   * Constructs a new TaxonomyTermTreeCache service.
   *
   * @param \Drupal\Core\Routing\RouteMatchInterface $route_match
   *   The current route match.
   * @param \Drupal\Core\Entity\EntityTypeManagerInterface
   *   Entity type manager.
   */
  public function __construct(RouteMatchInterface $route_match, EntityTypeManagerInterface $entity_type_manager) {
    $this->routeMatch = $route_match;
    $this->entityTypeManager = $entity_type_manager;
  }

  /**
   * {@inheritdoc}
   */
  public static function getLabel() {
    return t("Taxonomy term tree");
  }

  /**
   * {@inheritdoc}
   */
  public function getContext($vid = NULL) {
    $route_parameters = $this->routeMatch->getParameters();
    if ($route_parameters->has('taxonomy_term')) {
      $current_taxonomy_term = $route_parameters->get('taxonomy_term');
      if (is_numeric($current_taxonomy_term)) {
        $current_taxonomy_term = $this->entityTypeManager->getStorage('taxonomy_term')->load($current_taxonomy_term);
      }

      if ($current_taxonomy_term instanceof TermInterface) {
        if (is_null($vid) || $current_taxonomy_term->bundle() === $vid) {
          return 'taxonomy_term.' . $current_taxonomy_term->id();
        }
      }
    }

    return 'taxonomy_term.none';
  }

  /**
   * {@inheritdoc}
   */
  public function getCacheableMetadata($vid = NULL) {
    $cacheable_metadata = new CacheableMetadata();

    if ($vid) {
      $cacheable_metadata->addCacheTags(['taxonomy_term_list:' . $vid, 'taxonomy_vocabulary:' . $vid]);
    }
    else {
      $cacheable_metadata->addCacheTags(['config:taxonomy_vocabulary_list']);
    }

    return $cacheable_metadata;
  }

}
