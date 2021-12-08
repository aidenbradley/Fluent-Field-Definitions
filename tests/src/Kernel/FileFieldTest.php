<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\FileField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class FileFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @var string[] */
    protected static $modules = [
        'file',
    ];

    /** @test */
    public function enable_display_field(): void
    {
        $field = FileField::make('file_field')->enableDisplayField();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertTrue($node->get('file_field')->getFieldDefinition()->getSetting('display_field'));
    }

    /** @test */
    public function enable_display_default(): void
    {
        $field = FileField::make('file_field')->enableDisplayField()->enableDisplayDefault();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertTrue($node->get('file_field')->getFieldDefinition()->getSetting('display_default'));
    }

    /** @test */
    public function file_storage_directory()
    {
        $field = FileField::make('file_field')->fileStorageDirectory('store/me/here');

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            'store/me/here',
            $node->get('file_field')->getFieldDefinition()->getSetting('file_directory')
        );
    }

    /** @test */
    public function allowed_extensions(): void
    {
        $extensions = [
            'png',
            'jpg',
            'jpeg',
        ];
        $field = FileField::make('file_field')->allowedFileExtensions($extensions);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            implode(' ', $extensions),
            $node->get('file_field')->getFieldDefinition()->getSetting('file_extensions')
        );
    }
}
