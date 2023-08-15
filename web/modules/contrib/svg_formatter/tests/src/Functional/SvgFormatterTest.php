<?php

namespace Drupal\Tests\svg_formatter\Functional;

use Drupal\Core\File\Exception\FileException;
use Drupal\Core\File\FileSystemInterface;
use Drupal\field\Entity\FieldConfig;
use Drupal\media\Entity\Media;
use Drupal\Tests\BrowserTestBase;
use Drupal\Tests\media\Traits\MediaTypeCreationTrait;

/**
 * Simple test to ensure that basic functionality of the module works.
 *
 * @group svg_formatter
 */
class SvgFormatterTest extends BrowserTestBase {

  use MediaTypeCreationTrait;

  /**
   * SVG data.
   */
  const SVG_DATA = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136 72"><defs><radialGradient id="phpg" gradientUnits="userSpaceOnUse" cx="250" cy="0" r="300" fx="16" fy="0"><stop offset="0.3" stop-color="#CCF"/><stop offset="0.6" stop-color="#334"/></radialGradient></defs><g fill="#000" fill-rule="evenodd" stroke="#FFF" stroke-width="2" transform="scale(0.45)"><ellipse stroke="url(#phpg)" stroke-width="8" fill="#6C7EB7" cx="150" cy="80" rx="143" ry="73"/><path d="M116 104l16-81 19 0-4 21 18 0c16,1 22,9 20,19l-7 41-20 0 7-37c1,-5 1,-8-6,-8l-15 0-9 45-19 0z"/><path d="M45 125l16-81 37 0c16,1 24,9 24,23 0,24-19,38-36,37l-18 0-4 21-19 0zm27-36l5-30 13 0c7,0 12,3 12,9-1,17-9,20-18,21l-12 0z"/><path d="M179 125l15-81 38 0c16,1 24,9 24,23-1,24-20,38-37,37l-17 0-4 21-19 0zm26-36l6-30 12 0c8,0 13,3 12,9 0,17-8,20-18,21l-12 0z"/></g><script><![CDATA[alert("attack");]]></script></svg>';

  /**
   * SVG with title attribute data.
   */
  const SVG_DATA_WITH_TITLE = '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 136 72" aria-labelledby="field-media-file-title-0"><title id="field-media-file-title-0">Test Image</title><defs><radialGradient id="phpg" gradientUnits="userSpaceOnUse" cx="250" cy="0" r="300" fx="16" fy="0"><stop offset="0.3" stop-color="#CCF"/><stop offset="0.6" stop-color="#334"/></radialGradient></defs><g fill="#000" fill-rule="evenodd" stroke="#FFF" stroke-width="2" transform="scale(0.45)"><ellipse stroke="url(#phpg)" stroke-width="8" fill="#6C7EB7" cx="150" cy="80" rx="143" ry="73"/><path d="M116 104l16-81 19 0-4 21 18 0c16,1 22,9 20,19l-7 41-20 0 7-37c1,-5 1,-8-6,-8l-15 0-9 45-19 0z"/><path d="M45 125l16-81 37 0c16,1 24,9 24,23 0,24-19,38-36,37l-18 0-4 21-19 0zm27-36l5-30 13 0c7,0 12,3 12,9-1,17-9,20-18,21l-12 0z"/><path d="M179 125l15-81 38 0c16,1 24,9 24,23-1,24-20,38-37,37l-17 0-4 21-19 0zm26-36l6-30 12 0c8,0 13,3 12,9 0,17-8,20-18,21l-12 0z"/></g><script><![CDATA[alert("attack");]]></script></svg>';

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = [
    'system',
    'file',
    'media',
    'token',
    'svg_formatter',
  ];

  /**
   * {@inheritdoc}
   */
  protected $defaultTheme = 'stark';

  /**
   * Default testing media type.
   *
   * @var \Drupal\media\MediaTypeInterface
   */
  private $defaultMediaType;

  /**
   * Field definition of default testing media type source field.
   *
   * @var \Drupal\Core\Field\FieldDefinitionInterface
   */
  private $defaultSourceField;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();
    // Create bundle and modify form display.
    $this->defaultMediaType = $this->createMediaType('file', [
      'id' => 'svg',
      'label' => 'SVG',
    ]);
    $this->defaultSourceField = $this->defaultMediaType->getSource()->getSourceFieldDefinition($this->defaultMediaType);

    $field_config = FieldConfig::load('media.svg.field_media_file');
    $settings = $field_config->getSettings();
    $settings['file_extensions'] = 'svg';
    $field_config->set('settings', $settings);
    $field_config->save();

    $display_config = [
      'targetEntityType' => 'media',
      'bundle' => 'svg',
      'mode' => 'default',
      'status' => TRUE,
    ];

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->create($display_config);
    $display->setComponent('field_media_file', [
      'label' => 'above',
      'type' => 'svg_formatter',
      'settings' => [
        'inline' => FALSE,
        'sanitize' => TRUE,
        'apply_dimensions' => TRUE,
        'width' => 100,
        'height' => 100,
        'enable_alt' => TRUE,
        'alt_string' => '',
        'enable_title' => TRUE,
        'title_string' => '',
      ],
    ])->save();

    // Enable the media/{media} route.
    $media_settings = $this->container->get('config.factory')->getEditable('media.settings');
    $media_settings->set('standalone_url', TRUE)->save();
    $this->container->get('router.builder')->rebuild();
  }

  /**
   * Generates test SVG file.
   *
   * @return \Drupal\file\FileInterface|false
   *   The creaed file entity.
   */
  public static function generateTestSvgFile() {
    $extension = 'svg';

    /** @var \Drupal\Core\File\FileSystemInterface $file_system */
    $file_system = \Drupal::service('file_system');
    $tmp_file = $file_system->tempnam('temporary://', 'generateImage_');
    $destination = $tmp_file . '.' . $extension;

    try {
      $file_system->move($tmp_file, $destination);
    }
    catch (FileException $e) {
      // Ignore failed move.
    }

    $source_file = \Drupal::service('file.repository')
      ->writeData(self::SVG_DATA, $destination, FileSystemInterface::EXISTS_REPLACE);

    return $source_file;
  }

  /**
   * Creates a media entity.
   *
   * @return \Drupal\media\Entity\Media
   *   The created media entity.
   *
   * @throws \Drupal\Core\Entity\EntityStorageException
   */
  protected function createMediaEntity() {
    $value = static::generateTestSvgFile();
    $media = Media::create([
      'name' => 'test',
      'bundle' => 'svg',
      $this->defaultSourceField->getName() => $value->id(),

    ]);
    $media->save();
    return $media;
  }

  /**
   * Tests non-inline image output.
   */
  public function testNonInlineImageOutput() {
    $media = $this->createMediaEntity();
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => FALSE,
      'sanitize' => FALSE,
      'apply_dimensions' => FALSE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => '',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->elementAttributeContains('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img', 'src', $media->get('field_media_file')->entity->getFilename());
  }

  /**
   * Tests inline image output.
   */
  public function testInlineImageOutput() {
    $media = $this->createMediaEntity();
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => TRUE,
      'sanitize' => FALSE,
      'apply_dimensions' => FALSE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => FALSE,
      'alt_string' => '',
      'enable_title' => FALSE,
      'title_string' => '',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->responseContains(self::SVG_DATA);
  }

  /**
   * Tests inline image output with title attribute.
   */
  public function testInlineImageWithTitleOutput() {
    $media = $this->createMediaEntity();
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => TRUE,
      'sanitize' => FALSE,
      'apply_dimensions' => FALSE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => 'Test Image',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->responseContains(self::SVG_DATA_WITH_TITLE);
  }

  /**
   * Tests inline image output without sanitization.
   */
  public function testWithoutSanitization() {
    $media = $this->createMediaEntity();
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => TRUE,
      'sanitize' => FALSE,
      'apply_dimensions' => FALSE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => '',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->responseContains('alert("attack");');
  }

  /**
   * Tests inline image output with sanitization.
   */
  public function testWithSanitization() {
    $media = $this->createMediaEntity();
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => TRUE,
      'sanitize' => TRUE,
      'apply_dimensions' => FALSE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => '',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->responseNotContains('alert("attack");');
  }

  /**
   * Tests alt and title attributes.
   */
  public function testAltAndTitleAttributes() {
    $entity_type_manager = $this->container->get('entity_type.manager');
    foreach (['field_alt_string', 'field_title_string'] as $field_name) {
      $entity_type_manager->getStorage('field_storage_config')->create([
        'field_name' => $field_name,
        'entity_type' => 'media',
        'type' => 'string',
        'module' => 'svg_formatter',
        'settings' => [],
        'cardinality' => 1,
      ])->save();

      $entity_type_manager->getStorage('field_config')->create([
        'field_name' => $field_name,
        'entity_type' => 'media',
        'bundle' => 'svg',
        'label' => 'Field ' . $field_name,
      ])->save();
    }

    $media = $this->createMediaEntity();
    $media->set('field_alt_string', 'thisisthealttext');
    $media->set('field_title_string', 'thisisthetitletext');
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => FALSE,
      'sanitize' => TRUE,
      'apply_dimensions' => TRUE,
      'width' => 100,
      'height' => 100,
      'enable_alt' => TRUE,
      'alt_string' => '[media:field_alt_string]',
      'enable_title' => TRUE,
      'title_string' => '[media:field_title_string]',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->elementAttributeContains('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img', 'alt', 'thisisthealttext');
    $this->assertSession()->elementAttributeContains('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img', 'title', 'thisisthetitletext');

    $media->set('field_alt_string', NULL);
    $media->set('field_title_string', NULL);
    $media->save();

    $this->drupalGet('media/1');
    $this->assertFalse($this->assertSession()->elementExists('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img')->hasAttribute('alt'));
    $this->assertFalse($this->assertSession()->elementExists('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img')->hasAttribute('title'));
  }

  /**
   * Tests image size attributes.
   */
  public function testImageSizeAttributes() {
    $media = $this->createMediaEntity();
    $media->save();

    $display = $this->container->get('entity_type.manager')
      ->getStorage('entity_view_display')
      ->load('media.svg.default');

    $component = $display->getComponent('field_media_file');
    $component['settings'] = [
      'inline' => FALSE,
      'sanitize' => TRUE,
      'apply_dimensions' => TRUE,
      'width' => 99,
      'height' => 99,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => '',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->elementAttributeContains('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img', 'width', '99');
    $this->assertSession()->elementAttributeContains('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img', 'height', '99');

    // Test that image attributes don't exist if apply_dimensions is disabled.
    $component['settings'] = [
      'inline' => FALSE,
      'sanitize' => TRUE,
      'apply_dimensions' => FALSE,
      'width' => 99,
      'height' => 99,
      'enable_alt' => TRUE,
      'alt_string' => '',
      'enable_title' => TRUE,
      'title_string' => '',
    ];
    $display->setComponent('field_media_file', $component)->save();

    $this->drupalGet('media/1');
    $this->assertSession()->elementNotExists('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img[width]');
    $this->assertSession()->elementNotExists('css', 'main > div > div > div:nth-child(3) > div:nth-child(4) > div:nth-child(2) > img[height]');
  }

}
