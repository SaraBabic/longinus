<?php

namespace Drupal\paragraphs_previewer\Plugin\Field\FieldWidget;

use Drupal\paragraphs\Plugin\Field\FieldWidget\ParagraphsWidget;

/**
 * Plugin implementation of the 'paragraphs_previewer' widget.
 *
 * @FieldWidget(
 *   id = "paragraphs_previewer",
 *   label = @Translation("Paragraphs Previewer & Paragraphs EXPERIMENTAL"),
 *   description = @Translation("A paragraphs experimental form widget with a previewer."),
 *   field_types = {
 *     "entity_reference_revisions"
 *   },
 *   weight = 15
 * )
 */
class ParagraphsPreviewerWidget extends ParagraphsWidget {

  use ParagraphsPreviewerWidgetTrait;

  /**
   * The default edit mode.
   *
   * @var string
   */
  const PARAGRAPHS_PREVIEWER_DEFAULT_EDIT_MODE = 'closed';

}
