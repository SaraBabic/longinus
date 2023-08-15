<?php

namespace Drupal\paragraphs_previewer\Plugin\Field\FieldWidget;

use Drupal\paragraphs\Plugin\Field\FieldWidget\InlineParagraphsWidget;

/**
 * Plugin implementation of the 'entity_reference paragraphs' widget.
 *
 * We hide add / remove buttons when translating to avoid accidental loss of
 * data because these actions effect all languages.
 *
 * @FieldWidget(
 *   id = "entity_reference_paragraphs_previewer",
 *   label = @Translation("Paragraphs Previewer & Paragraphs Classic"),
 *   description = @Translation("An paragraphs inline form widget with a previewer."),
 *   field_types = {
 *     "entity_reference_revisions"
 *   },
 *   weight = 10
 * )
 */
class InlineParagraphsPreviewerWidget extends InlineParagraphsWidget {

  use ParagraphsPreviewerWidgetTrait;

  /**
   * The default edit mode.
   *
   * @var string
   */
  const PARAGRAPHS_PREVIEWER_DEFAULT_EDIT_MODE = 'closed';

}
