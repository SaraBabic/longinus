<?php

namespace Drupal\block_library\Controller;

use Drupal\layout_builder_restrictions\Controller\ChooseBlockController as ChooseBlockControllerBase;
use Drupal\layout_builder\SectionStorageInterface;
use Drupal\Core\Render\Markup;
use Drupal\block_content\Entity\BlockContentType;

/**
 * Defines a controller to choose a new block.
 *
 * @internal
 *   Controller classes are internal.
 */
class ChooseBlockController extends ChooseBlockControllerBase {

  /**
   * {@inheritdoc}
   */
  public function inlineBlockList(SectionStorageInterface $section_storage, $delta, $region) {
    $build = parent::inlineBlockList($section_storage, $delta, $region);
    // Loop through links and add the image before the title.
    foreach ($build['links']['#links'] as $key => $link) {
      // Get block configs.
      $url = $link["url"];
      $params = $url->getRouteParameters();
      $plugin_id = $params['plugin_id'];
      $block_type_id = str_replace('inline_block:', '', $plugin_id);
      $block_entity = BlockContentType::load($block_type_id);
      // Check if block type has icon.
      if ($block_entity && $block_entity->getThirdPartySetting('block_library', 'icon_path')) {
        $icon_path = $block_entity->getThirdPartySetting('block_library', 'icon_path');
        $icon_url = \Drupal::service('file_url_generator')->generateString($icon_path);

        // Add the image to the link title.
        $build['links']['#links'][$key]['title'] = Markup::create('<img src="' . $icon_url . '" class="bl-block-icon" /> ' . '<span class="bl-block-title">' . $link['title'] . '</span>');

        // Needed for inline SVG's "currentColor" attribute.
        if (mime_content_type($icon_path) === "image/svg") {
          $svg = file_get_contents(DRUPAL_ROOT . '/' . $icon_url);
          $svg = preg_replace(['/<\?xml.*\?>/i', '/<!DOCTYPE((.|\n|\r)*?)">/i'], '', $svg);
          $icon = trim($svg);
        }
        else {
          $icon = '<img src="' . $icon_url . '" class="bl-block-icon" /> ';
        }

        $build['links']['#links'][$key]['title'] = Markup::create($icon . '<span class="bl-block-title">' . $link['title'] . '</span>');

      }
    }

    // Add unique class to the list.
    $build['links']['#attributes']['class'][] = 'lb-list';
    // Attach the library to the build.
    $build['#attached']['library'][] = 'block_library/inline_blocks_style';
    return $build;
  }

}
