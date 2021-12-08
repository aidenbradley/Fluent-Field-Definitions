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
    public function enable_description_field()
    {
        $field = FileField::make('file_field')->enableDescriptionField();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertTrue((bool) $node->get('file_field')->getFieldDefinition()->getSetting('description_field'));
    }

    /** @test */
    public function disable_description_field()
    {
        $field = FileField::make('file_field')->disableDescriptionField();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertFalse((bool) $node->get('file_field')->getFieldDefinition()->getSetting('description_field'));
    }

    /** @test */
    public function use_public_uri_scheme(): void
    {
        $field = FileField::make('file_field')->usePublicUriScheme();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            'public',
            $node->get('file_field')->getFieldDefinition()->getSetting('uri_scheme')
        );
    }

    /** @test */
    public function use_private_uri_scheme(): void
    {
        $field = FileField::make('file_field')->usePrivateUriScheme();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            'private',
            $node->get('file_field')->getFieldDefinition()->getSetting('uri_scheme')
        );
    }

    /** @test */
    public function set_uri_scheme(): void
    {
        $field = FileField::make('file_field')->setUriScheme('custom');

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            'custom',
            $node->get('file_field')->getFieldDefinition()->getSetting('uri_scheme')
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

    /** @test */
    public function max_filesize_bytes(): void
    {
        $field = FileField::make('file_field')->maxFilesizeBytes(512);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            512,
            $node->get('file_field')->getFieldDefinition()->getSetting('max_filesize')
        );
    }

    /** @test */
    public function max_filesize_kilobytes(): void
    {
        $field = FileField::make('file_field')->maxFilesizeKilobytes(512);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            '512KB',
            $node->get('file_field')->getFieldDefinition()->getSetting('max_filesize')
        );
    }

    /** @test */
    public function max_filesize_megabytes(): void
    {
        $field = FileField::make('file_field')->maxFilesizeMegabytes(512);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'file_field' => '',
        ]);

        $this->assertEquals(
            '512MB',
            $node->get('file_field')->getFieldDefinition()->getSetting('max_filesize')
        );
    }
}
