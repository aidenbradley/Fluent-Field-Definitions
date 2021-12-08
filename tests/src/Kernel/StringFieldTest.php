<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\StringField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class StringFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @test */
    public function is_ascii(): void
    {
        $field = StringField::make('string_field')->isAscii();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'string',
        ]);

        $this->assertTrue(
            $node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('is_ascii')
        );
    }

    /** @test */
    public function max_length(): void
    {
        $field = StringField::make('string_field')->maxLength(101);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'string',
        ]);

        $this->assertEquals(
            101,
            $node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('max_length')
        );
    }

    /** @test */
    public function case_sensitive(): void
    {
        $field = StringField::make('string_field')->isCaseSensitive();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'string',
        ]);

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('case_sensitive'));
    }

    /** @test */
    public function not_case_sensitive(): void
    {
        $field = StringField::make('string_field')->notCaseSensitive();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'string_field' => 'string',
        ]);

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('case_sensitive'));
    }
}
