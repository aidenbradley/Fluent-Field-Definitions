<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\file\Entity\File;
use Drupal\fluent_field_definitions\ImageField;
use Drupal\node\Entity\Node;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class ImageFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @var string[] */
    protected static $modules = [
        'image',
        'file'
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->installEntitySchema('file');
        $this->installSchema('file', 'file_usage');
    }

    /** @test */
    public function maximum_resolution(): void
    {
        $field = ImageField::make('image_field')->maximumResolution(100, 100);

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertEquals(
            '100x100',
            $node->get('image_field')->getFieldDefinition()->getSetting('max_resolution')
        );
    }

    /** @test */
    public function minimum_resolution(): void
    {
        $field = ImageField::make('image_field')->minimumResolution(100, 100);

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertEquals(
            '100x100',
            $node->get('image_field')->getFieldDefinition()->getSetting('min_resolution')
        );
    }

    /** @test */
    public function enable_alt_field(): void
    {
        $field = ImageField::make('image_field')->enableAltField();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertTrue(
            $node->get('image_field')->getFieldDefinition()->getSetting('alt_field')
        );
    }

    /** @test */
    public function disable_alt_field(): void
    {
        $field = ImageField::make('image_field')->disableAltField();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertFalse(
            $node->get('image_field')->getFieldDefinition()->getSetting('alt_field')
        );
    }

    /** @test */
    public function alt_field_required(): void
    {
        $field = ImageField::make('image_field')->altFieldRequired();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertTrue(
            $node->get('image_field')->getFieldDefinition()->getSetting('alt_field_required')
        );
    }

    /** @test */
    public function alt_field_not_required(): void
    {
        $field = ImageField::make('image_field')->altFieldNotRequired();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertFalse(
            $node->get('image_field')->getFieldDefinition()->getSetting('alt_field_required')
        );
    }

    /** @test */
    public function enable_title_field(): void
    {
        $field = ImageField::make('image_field')->enableTitleField();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertTrue(
            $node->get('image_field')->getFieldDefinition()->getSetting('title_field')
        );
    }

    /** @test */
    public function disable_title_field(): void
    {
        $field = ImageField::make('image_field')->disableTitleField();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertFalse(
            $node->get('image_field')->getFieldDefinition()->getSetting('title_field')
        );
    }

    /** @test */
    public function title_field_required(): void
    {
        $field = ImageField::make('image_field')->titleFieldRequired();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertTrue(
            $node->get('image_field')->getFieldDefinition()->getSetting('title_field_required')
        );
    }

    /** @test */
    public function title_field_not_required(): void
    {
        $field = ImageField::make('image_field')->titleFieldNotRequired();

        $this->installField($field, 'node');

        $node = $this->createFileAndNode();

        $this->assertFalse(
            $node->get('image_field')->getFieldDefinition()->getSetting('title_field_required')
        );
    }

    private function createFileAndNode(): Node
    {
        File::create([
            'fid' => 1,
            'uri' => 'test',
        ])->save();

        return $this->createNode([
            'image_field' => 1,
        ]);
    }
}
