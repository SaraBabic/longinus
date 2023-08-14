<?php
/**
 * @file
 * Theme functions for the paragraphs_previewer module.
 */

use Drupal\Core\Render\BubbleableMetadata;

/**
 * Prepares variables for theme paragraphs_previewer_modal_content.
 *
 * Default template: paragraphs-previewer-modal-content.html.twig.
 *
 * @param array $variables
 *   An associative array containing:
 *   - preview_url: The Drupal\Core\Url object for the preview.
 */
function template_preprocess_paragraphs_previewer_modal_content(array &$variables) {
  if (!empty($variables['preview_url'])) {
    $preview_url = $variables['preview_url'];

    /* Render url.
    Processed bubbleable is needed for csrf route paths since
    RouteProcessorCsrf::processOutbound() adds a placeholder hash for the
    token so that link markup could be cached.
    See http://drupal.stackexchange.com/questions/175697/menu-callback-and-csrf
    See https://www.drupal.org/node/2575519 */
    $preview_url_bubbeable = $preview_url->toString(TRUE);
    $preview_url_render = [
      '#markup' => $preview_url_bubbeable->getGeneratedUrl(),
    ];
    BubbleableMetadata::createFromRenderArray($preview_url_render)
      ->merge($preview_url_bubbeable)
      ->applyTo($preview_url_render);

    $variables['preview_url_string'] = \Drupal::service('renderer')->renderPlain($preview_url_render);
  }
}
