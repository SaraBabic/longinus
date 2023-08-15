<?php

namespace Drupal\svg_formatter\Plugin\Field\FieldFormatter;

use Drupal\Component\Utility\Html;
use Drupal\Core\Entity\EntityRepositoryInterface;
use Drupal\Core\Extension\ModuleHandlerInterface;
use Drupal\Core\Field\FieldDefinitionInterface;
use Drupal\Core\Field\FieldItemListInterface;
use Drupal\Core\Field\FormatterBase;
use Drupal\Core\Form\FormStateInterface;
use Drupal\Core\Plugin\ContainerFactoryPluginInterface;
use Drupal\Core\Utility\Token;
use enshrined\svgSanitize\Sanitizer;
use Symfony\Component\DependencyInjection\ContainerInterface;

/**
 * Plugin implementation of the 'svg_formatter' formatter.
 *
 * @FieldFormatter(
 *   id = "svg_formatter",
 *   label = @Translation("SVG Formatter"),
 *   field_types = {
 *     "file",
 *     "image"
 *   }
 * )
 */
class SvgFormatter extends FormatterBase implements ContainerFactoryPluginInterface {

  /**
   * The name of the field to which the formatter is associated.
   *
   * @var string
   */
  protected $fieldName;

  /**
   * Module handler.
   *
   * @var \Drupal\Core\Extension\ModuleHandlerInterface
   */
  protected $moduleHandler;

  /**
   * Token service.
   *
   * @var \Drupal\Core\Utility\Token
   */
  protected $token;

  /**
   * The entity repository.
   *
   * @var \Drupal\Core\Entity\EntityRepositoryInterface
   */
  protected $entityRepository;

  /**
   * {@inheritdoc}
   */
  public function __construct($plugin_id, $plugin_definition, FieldDefinitionInterface $field_definition, array $settings, $label, $view_mode, array $third_party_settings, ModuleHandlerInterface $module_handler, Token $token, EntityRepositoryInterface $entity_repository) {
    parent::__construct($plugin_id, $plugin_definition, $field_definition, $settings, $label, $view_mode, $third_party_settings);

    $this->fieldName = $field_definition->getName();
    $this->moduleHandler = $module_handler;
    $this->token = $token;
    $this->entityRepository = $entity_repository;
  }

  /**
   * {@inheritdoc}
   */
  public static function create(ContainerInterface $container, array $configuration, $plugin_id, $plugin_definition) {
    return new static(
      $plugin_id,
      $plugin_definition,
      $configuration['field_definition'],
      $configuration['settings'],
      $configuration['label'],
      $configuration['view_mode'],
      $configuration['third_party_settings'],
      $container->get('module_handler'),
      $container->get('token'),
      $container->get('entity.repository')
    );
  }

  /**
   * {@inheritdoc}
   */
  public static function defaultSettings() {
    return [
      'inline' => FALSE,
      'sanitize' => TRUE,
      'apply_dimensions' => TRUE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => '',
    ] + parent::defaultSettings();
  }

  /**
   * {@inheritdoc}
   */
  public function settingsForm(array $form, FormStateInterface $form_state) {
    $form = parent::settingsForm($form, $form_state);
    $token_module = $this->moduleHandler->moduleExists('token');

    $form['inline'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Output SVG inline'),
      '#default_value' => $this->getSetting('inline'),
      '#description' => $this->t('Check this option if you want to manipulate the SVG image with CSS and Javascript.'),
    ];
    $sanitize_attributes = $this->isSanitizerInstalled() ? [] : ['disabled' => 'disabled'];
    $form['sanitize'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Sanitize inline SVG'),
      '#default_value' => $this->getSetting('sanitize'),
      '#description' => $this->t('For this to work you must install "enshrined/svg-sanitize" library with composer.'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][inline]"]' => ['checked' => TRUE],
        ],
      ],
      '#attributes' => $sanitize_attributes,
    ];
    $form['apply_dimensions'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Set image dimensions.'),
      '#default_value' => $this->getSetting('apply_dimensions'),
    ];
    $form['width'] = [
      '#type' => 'number',
      '#title' => $this->t('Image width.'),
      '#default_value' => $this->getSetting('width'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][apply_dimensions]"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['height'] = [
      '#type' => 'number',
      '#title' => $this->t('Image height.'),
      '#default_value' => $this->getSetting('height'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][apply_dimensions]"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['enable_alt'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable alt attribute.'),
      '#default_value' => $this->getSetting('enable_alt'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][inline]"]' => ['checked' => FALSE],
        ],
      ],
    ];
    $form['alt_string'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Token with alt value'),
      '#description' => ($token_module) ? $this->t('Use the token help link below to select the token.') : $this->t('Install token module to see available tokens.'),
      '#default_value' => $this->getSetting('alt_string'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][enable_alt]"]' => ['checked' => TRUE],
        ],
      ],
    ];
    $form['enable_title'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Enable title attribute.'),
      '#default_value' => $this->getSetting('enable_title'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][inline]"]' => ['checked' => FALSE],
        ],
      ],
    ];
    $form['title_string'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Token with title value'),
      '#description' => ($token_module) ? $this->t('Use the token help link below to select the token.') : $this->t('Install token module to see available tokens.'),
      '#default_value' => $this->getSetting('title_string'),
      '#states' => [
        'visible' => [
          ':input[name="fields[' . $this->fieldName . '][settings_edit_form][settings][enable_title]"]' => ['checked' => TRUE],
        ],
      ],
    ];
    if ($token_module) {
      $form['token_help'] = [
        '#theme' => 'token_tree_link',
        '#token_types' => [
          $this->fieldDefinition->getTargetEntityTypeId(),
          'file',
        ],
      ];
    }

    return $form;
  }

  /**
   * {@inheritdoc}
   */
  public function settingsSummary() {
    $summary = [];
    // Implement settings summary.
    if ($this->getSetting('inline')) {
      $summary[] = $this->t('Inline SVG');
    }
    if ($this->getSetting('sanitize')) {
      $summary[] = $this->t('Sanitize inline SVG');
    }
    if ($this->getSetting('apply_dimensions') && $this->getSetting('width')) {
      $summary[] = $this->t('Image width:') . ' ' . $this->getSetting('width');
    }
    if ($this->getSetting('apply_dimensions') && $this->getSetting('height')) {
      $summary[] = $this->t('Image height:') . ' ' . $this->getSetting('height');
    }
    if ($this->getSetting('enable_alt') && !$this->getSetting('inline')) {
      $summary[] = $this->t('Alt enabled');
      if ($this->getSetting('alt_string')) {
        $summary[] = $this->t('Alt token:') . ' ' . $this->getSetting('alt_string');
      }
    }
    if ($this->getSetting('enable_title') && !$this->getSetting('inline')) {
      $summary[] = $this->t('Title enabled');

      if ($this->getSetting('title_string')) {
        $summary[] = $this->t('Title token:') . ' ' . $this->getSetting('title_string');
      }
    }

    return $summary;
  }

  /**
   * {@inheritdoc}
   */
  public function viewElements(FieldItemListInterface $items, $langcode) {
    $elements = [];
    $attributes = [];
    if ($this->getSetting('apply_dimensions')) {
      $attributes['width'] = $this->getSetting('width');
      $attributes['height'] = $this->getSetting('height');
    }

    foreach ($items as $delta => $item) {
      if ($item->entity) {
        $file = $item->entity;
        $parent = $items->getParent()->getEntity();

        // Skip if this is not a SVG image.
        if ($item->entity->getMimeType() !== 'image/svg+xml') {
          continue;
        }

        $filename = $item->entity->getFilename();
        $default_alt = $this->generateAltAttribute($filename);
        $token_data = [
          'file' => $this->entityRepository->getTranslationFromContext($file),
          $parent->getEntityTypeId() => $this->entityRepository->getTranslationFromContext($parent),
        ];
        $replace_options = ['clear' => TRUE];

        if ($this->getSetting('enable_alt')) {
          if ($this->getSetting('alt_string')) {
            if ($alt = $this->token->replace($this->getSetting('alt_string'), $token_data, $replace_options)) {
              $attributes['alt'] = $alt;
            }
          }
          else {
            $attributes['alt'] = $default_alt;
          }
        }
        if ($this->getSetting('enable_title')) {
          if ($this->getSetting('title_string')) {
            if ($title = $this->token->replace($this->getSetting('title_string'), $token_data, $replace_options)) {
              $attributes['title'] = $title;
            }
          }
          else {
            $attributes['title'] = $default_alt;
          }
        }
        $uri = $item->entity->getFileUri();

        $svg_data = NULL;
        if ($this->getSetting('inline')) {
          $svg_file = file_exists($uri) ? file_get_contents($uri) : NULL;

          // Sanitize inline SVG if sanitizing library is installed.
          if ($svg_file &&
            $this->isSanitizerInstalled() &&
            $this->getSetting('sanitize')
          ) {
            $sanitizer = new Sanitizer();
            $svg_file = $sanitizer->sanitize($svg_file);
          }

          if ($svg_file) {
            $dom = new \DOMDocument();
            libxml_use_internal_errors(TRUE);
            $dom->loadXML($svg_file);
            if ($this->getSetting('apply_dimensions') && isset($dom->documentElement)) {
              $dom->documentElement->setAttribute('height', $attributes['height']);
              $dom->documentElement->setAttribute('width', $attributes['width']);
            }
            if ($this->getSetting('enable_title') && isset($dom->documentElement)) {
              $title = $dom->createElement('title', $attributes['title']);
              $title_id = Html::getUniqueId($this->fieldName . '-title-' . $delta);
              $title->setAttribute('id', $title_id);
              $dom->documentElement->insertBefore($title, $dom->documentElement->firstChild);
              $dom->documentElement->setAttribute('aria-labelledby', $title_id);
            }
            $svg_data = $dom->saveXML($dom->documentElement);
          }
        }

        $elements[$delta] = [
          '#theme' => 'svg_formatter',
          '#inline' => $this->getSetting('inline') ? TRUE : FALSE,
          '#attributes' => $attributes,
          '#uri' => $this->getSetting('inline') ? NULL : $uri,
          '#svg_data' => $this->getSetting('inline') ? $svg_data : NULL,
        ];
      }
    }

    return $elements;
  }

  /**
   * Generates alt attribute from an image filename.
   */
  protected function generateAltAttribute($filename) {
    $alt = str_replace(['.svg', '-', '_'], ['', ' ', ' '], $filename);
    $alt = ucfirst($alt);

    return $alt;
  }

  /**
   * Checks if "enshrined/svg-sanitize" library is installed.
   */
  protected function isSanitizerInstalled() {
    return class_exists('\enshrined\svgSanitize\Sanitizer');
  }

  /**
   * {@inheritdoc}
   */
  public static function isApplicable(FieldDefinitionInterface $field_definition) {
    if ($field_definition->getType() == 'image') {
      $module_handler = \Drupal::service('module_handler');
      if ($module_handler->moduleExists('svg_image')) {
        return TRUE;
      }
      else {
        return FALSE;
      }
    }

    return TRUE;
  }

}
