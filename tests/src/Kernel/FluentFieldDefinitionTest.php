<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\StringField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class FluentFieldDefinitionTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @test */
    public function set_label()
    {
        $field = StringField::make('string_field')
            ->setLabel('This is my label');

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertEquals(
            'This is my label',
            $node->get('string_field')->getFieldDefinition()->getLabel()
        );
    }

    /** @test */
    public function with_configurable_form(): void
    {
        $field = StringField::make('string_field')
            ->withConfigurableForm();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('form'));
    }

    /** @test */
    public function non_configurable_form(): void
    {
        $field = StringField::make('string_field')
            ->nonConfigurableForm();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('form'));
    }

    /** @test */
    public function with_configurable_view(): void
    {
        $field = StringField::make('string_field')
            ->withConfigurableView();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('view'));
    }

    /** @test */
    public function non_configurable_view(): void
    {
        $field = StringField::make('string_field')
            ->nonConfigurableView();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('view'));
    }

    /** @test */
    public function translatable(): void
    {
        $field = StringField::make('string_field')->translatable();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->isTranslatable());
    }

    /** @test */
    public function not_translatable(): void
    {
        $field = StringField::make('string_field')->notTranslatable();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->isTranslatable());
    }

    /** @test */
    public function revisionable(): void
    {
        $field = StringField::make('string_field')->revisionable();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertTrue(
            $node->get('string_field')->getFieldDefinition()->getFieldStorageDefinition()->isRevisionable()
        );
    }

    /** @test */
    public function not_revisionable(): void
    {
        $field = StringField::make('string_field')->notRevisionable();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'test',
        ]);

        $this->assertFalse(
            $node->get('string_field')->getFieldDefinition()->getFieldStorageDefinition()->isRevisionable()
        );
    }
}
