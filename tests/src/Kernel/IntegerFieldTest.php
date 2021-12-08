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
        $field = IntegerField::make('integer_field')->isUnsigned();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'integer_field' => 1,
        ]);

        $this->assertFalse($node->get('integer_field')->getFieldDefinition()->getSetting('unsigned'));
    }
}
