<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\IntegerField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class IntegerFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @test */
    public function unsigned()
    {
        $field = IntegerField::make('integer_field')->isUnsigned();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertTrue($node->get('integer_field')->getFieldDefinition()->getSetting('unsigned'));
    }

    /** @test */
    public function not_unsigned()
    {
        $field = IntegerField::make('integer_field')->notUnsigned();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertFalse($node->get('integer_field')->getFieldDefinition()->getSetting('unsigned'));
    }

    /** @test */
    public function tiny_size()
    {
        $field = IntegerField::make('integer_field')->tinySize();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertEquals(
            'tiny',
            $node->get('integer_field')->getFieldDefinition()->getSetting('size')
        );
    }

    /** @test */
    public function small_size()
    {
        $field = IntegerField::make('integer_field')->smallSize();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertEquals(
            'small',
            $node->get('integer_field')->getFieldDefinition()->getSetting('size')
        );
    }

    /** @test */
    public function medium_size()
    {
        $field = IntegerField::make('integer_field')->mediumSize();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertEquals(
            'medium',
            $node->get('integer_field')->getFieldDefinition()->getSetting('size')
        );
    }

    /** @test */
    public function normal_size()
    {
        $field = IntegerField::make('integer_field')->normalSize();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertEquals(
            'normal',
            $node->get('integer_field')->getFieldDefinition()->getSetting('size')
        );
    }

    /** @test */
    public function big_size()
    {
        $field = IntegerField::make('integer_field')->bigSize();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertEquals(
            'big',
            $node->get('integer_field')->getFieldDefinition()->getSetting('size')
        );
    }
}
