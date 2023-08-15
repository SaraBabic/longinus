<?php

namespace Drupal\paragraphs_previewer\Plugin\Field\FieldWidget;

/**
 * Plugin implementation of the 'paragraphs_previwer' widget.
 *
 * @FieldWidget(
 *   id = "paragraphs_previwer",
 *   label = @Translation("DEPRECATED Paragraphs Previewer (Use Paragraphs Previewer)"),
 *   description = @Translation("DEPRECATED paragraphs form widget that a misspelled plugin id."),
 *   field_types = {
 *     "entity_reference_revisions"
 *   },
 *   weight = 100
 * )
 */
class ParagraphsPreviewerWidgetDeprecated extends ParagraphsPreviewerWidget {

}
