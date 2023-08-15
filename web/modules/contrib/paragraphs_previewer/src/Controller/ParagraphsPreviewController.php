<?php

namespace Drupal\paragraphs_previewer\Controller;

use Drupal\Core\Controller\ControllerBase;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;
use Drupal\Core\Form\FormState;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Field\WidgetBase;
use Drupal\paragraphs\Entity\Paragraph;
use Drupal\Core\Entity\EntityInterface;
use Drupal\Core\Entity\ContentEntityBase;

/**
 * Previewer for paragraphs.
 */
class ParagraphsPreviewController extends ControllerBase {

  /**
   * Render a preview while on a form.
   *
   * This callback is mapped to the path
   * 'paragraphs-previewer/form/{form_build_id}.
   *
   * Usage:
   * 'paragraphs-previewer/form/abcd1234?p[0]=field_name&p[1]=delta'.
   *
   * @param string $form_build_id
   *   The form build id.
   * @param string|array $element_parents
   *   The item parents argument from the field to the item delta.
   *
   * @return array
   *   The render array.
   *
   * @throws \Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException
   *   If the parameters are invalid.
   */
  public function onForm($form_build_id, $element_parents) {
    // Parameter check.
    if (empty($form_build_id) || empty($element_parents)) {
      throw new AccessDeniedHttpException();
    }

    // Initialize render array.
    $output_render = [];

    // Expand element parents.
    $element_parents_array = is_array($element_parents) ? $element_parents : explode(':', $element_parents);

    if (!empty($element_parents_array) && count($element_parents_array) >= 2) {
      $form_state = new FormState();
      $form = \Drupal::formBuilder()->getCache($form_build_id, $form_state);

      if ($form && ($form_entity = $form_state->getFormObject()->getEntity())) {
        $field_parents = $element_parents_array;
        $field_delta = array_pop($field_parents);
        $field_name = array_pop($field_parents);

        $widget_state = WidgetBase::getWidgetState($field_parents, $field_name, $form_state);
        if (!empty($widget_state['paragraphs'][$field_delta]['entity'])) {
          $paragraph = $widget_state['paragraphs'][$field_delta]['entity'];
          $parent_entity = $this->findParentEntity($paragraph, $field_parents, $form_state, $form_entity);
          if ($parent_entity) {
            $field_render = $this->paragraphsPreviewRenderParentField($paragraph, $field_name, $parent_entity);
            if ($field_render) {
              $output_render['preview'] = $field_render;
            }
          }
        }
      }
    }

    // Set empty message if nothing is rendered.
    if (empty($output_render)) {
      $output_render['empty'] = [
        '#markup' => $this->t('No preview available.'),
      ];
    }

    // Add styles to cleanup display.
    $output_render['#attached']['library'][] = 'paragraphs_previewer/preview-page';

    return $output_render;
  }

  /**
   * Find the parent entity of the paragraph.
   *
   * Finds any parent paragraphs else defaults to the form entity provided.
   * Note: only paragraphs are supported as parent or intermediate entities.
   *
   * @param \Drupal\paragraphs\Entity\Paragraph $paragraph
   *   The paragraph entity.
   * @param array $field_parents
   *   The field parents of the paragraph.
   * @param \Drupal\Core\Form\FormStateInterface $form_state
   *   The form state.
   * @param \Drupal\Core\Entity\EntityInterface $form_entity
   *   The form entity.
   *
   * @return \Drupal\Core\Entity\EntityInterface
   *   The parent entity if found else the form entity.
   */
  public function findParentEntity(Paragraph $paragraph, array $field_parents, FormStateInterface $form_state, EntityInterface $form_entity = NULL) {
    if (in_array('subform', $field_parents, TRUE)) {
      // Traverse up to find the parent.
      foreach (array_reverse($field_parents, TRUE) as $i => $element_key) {
        if ($element_key === 'subform') {
          // Slice one level above 'subform'.
          $parent_field_parents = array_slice($field_parents, 0, $i);
          if ($parent_field_parents) {
            $parent_field_delta = array_pop($parent_field_parents);
            $parent_field_name = array_pop($parent_field_parents);
            $widget_state = WidgetBase::getWidgetState($parent_field_parents, $parent_field_name, $form_state);
            if (!empty($widget_state['paragraphs'][$parent_field_delta]['entity'])) {

              // Return first found.
              return $widget_state['paragraphs'][$parent_field_delta]['entity'];
            }
          }

          // Break on first found.
          break;
        }
      }
    }

    return $form_entity;
  }

  /**
   * Render a single field on the parent entity for the given paragraph.
   *
   * @param Paragraph $paragraph
   *   The paragraph entity.
   * @param string $parent_field_name
   *   The field name of the paragraph reference field on the parent entity.
   * @param ContentEntityBase $parent_entity
   *   Optional. The parent entity. This is used when on a form to allow
   *   rendering with un-saved parents.
   *
   * @return array|null
   *   A render array for the field.
   */
  public function paragraphsPreviewRenderParentField(Paragraph $paragraph, $parent_field_name, ContentEntityBase $parent_entity = NULL) {
    if (!isset($parent_entity)) {
      $parent_entity = $paragraph->getParentEntity();
    }

    if ($parent_entity && ($parent_entity instanceof ContentEntityBase)) {
      $parent_class = get_class($parent_entity);
      $parent_entity_type = $parent_entity->getEntityTypeId();

      if ($parent_entity->hasField($parent_field_name)) {
        $parent_view_mode = \Drupal::config('paragraphs_previewer.settings')->get('previewer_view_mode');
        $parent_view_mode = $parent_view_mode ? $parent_view_mode : 'full';

        // Create a new paragraph with no id.
        $paragraph_clone = $paragraph->createDuplicate();

        // Clone the entity since we are going to modify field values.
        $parent_clone = clone $parent_entity;

        // Create field item values.
        $parent_field_item_value = ['entity' => $paragraph_clone];

        // Based on \Drupal\Core\Entity\EntityViewBuilder to allow arbitrary
        // field data to be rendered.
        // See https://www.drupal.org/node/2274169
        // Push the item as the single value for the field, and defer to
        // FieldItemBase::view() to build the render array.
        $parent_clone->{$parent_field_name}->setValue([$parent_field_item_value]);

        // TODO: This clones the parent again and uses
        // EntityViewBuilder::viewFieldItem().
        $elements = $parent_clone->{$parent_field_name}->view($parent_view_mode);

        // Extract the part of the render array we need.
        $output = isset($elements[0]) ? $elements[0] : [];
        if (isset($elements['#access'])) {
          $output['#access'] = $elements['#access'];
        }

        return $output;
      }
    }
  }

}
