<?php

namespace Drupal\Tests\lightgallery\Kernel\Plugin\Field\FieldFormatter;

use Drupal\Core\Field\FieldStorageDefinitionInterface;
use Drupal\entity_test\Entity\EntityTest;
use Drupal\field\Entity\FieldConfig;
use Drupal\field\Entity\FieldStorageConfig;
use Drupal\file\Entity\File;
use Drupal\Tests\field\Kernel\FieldKernelTestBase;

/**
 * Test the lightgallery field formatter plugin.
 *
 * @group lightgallery
 *
 * @coversDefaultClass \Drupal\lightgallery\Plugin\Field\FieldFormatter\LightgalleryFormatter
 */
class LightgalleryFormatterTest extends FieldKernelTestBase {

  /**
   * Modules to enable.
   *
   * @var array
   */
  protected static $modules = ['file', 'image', 'lightgallery', 'entity_test'];

  /**
   * The entity type test.
   *
   * @var string
   */
  protected $entityType;

  /**
   * The entity test bundle.
   *
   * @var string
   */
  protected $bundle;

  /**
   * The image test field name.
   *
   * @var string
   */
  protected $fieldName;

  /**
   * The field display.
   *
   * @var \Drupal\Core\Entity\Display\EntityViewDisplayInterface
   */
  protected $display;

  /**
   * {@inheritdoc}
   */
  protected function setUp(): void {
    parent::setUp();

    $this->installConfig(['field']);
    $this->installEntitySchema('entity_test');
    $this->installEntitySchema('file');
    $this->installSchema('file', ['file_usage']);

    $this->entityType = 'entity_test';
    $this->bundle = $this->entityType;
    $this->fieldName = mb_strtolower($this->randomMachineName());

    FieldStorageConfig::create([
      'entity_type' => $this->entityType,
      'field_name' => $this->fieldName,
      'type' => 'image',
      'cardinality' => FieldStorageDefinitionInterface::CARDINALITY_UNLIMITED,
    ])->save();
    FieldConfig::create([
      'entity_type' => $this->entityType,
      'field_name' => $this->fieldName,
      'bundle' => $this->bundle,
      'settings' => [
        'file_extensions' => 'png',
      ],
    ])->save();

    $this->display = \Drupal::service('entity_display.repository')
      ->getViewDisplay($this->entityType, $this->bundle)
      ->setComponent($this->fieldName, [
        'type' => 'lightgallery',
      ]);
    $this->display->save();
  }

  /**
   * Tests lightgallery fomart.
   */
  public function testLightgalleryImageFormatter() {
    // Install the default image styles.
    $this->installConfig(['image']);

    /** @var \Drupal\Core\File\FileSystemInterface $file_system */
    $file_system = $this->container->get('file_system');

    $file_system->copy(DRUPAL_ROOT . '/core/misc/druplicon.png', 'public://logo.png');
    $file_system->copy(DRUPAL_ROOT . '/core/misc/tree.png', 'public://tree.png');

    // Create a logo file.
    $drupal_logo_file = File::create([
      'uri' => 'public://logo.png',
    ]);
    $drupal_logo_file->save();

    // Create the tree file for testing purposes.
    $tree_file = File::create([
      'uri' => 'public://tree.png',
    ]);
    $tree_file->save();

    $entity = EntityTest::create([
      'name' => $this->randomMachineName(),
      $this->fieldName => [$drupal_logo_file, $tree_file],
    ]);
    $entity->save();

    // Render a page.
    $build = $this->display->build($entity);
    $content = $this->container->get('renderer')->renderRoot($build)->__toString();

    $this->assertStringContainsString('<div class="lightgallery-wrapper">', $content);
    $this->assertStringContainsString('<img class="img-responsive"', $content);
    $this->assertStringContainsString('<ul class="lightgallery"', $content);

  }

}
