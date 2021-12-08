<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\FloatField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class FloatFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @test */
    public function min(): void
    {
        $field = FloatField::make('float_field')->min(100);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'float_field' => 1,
        ]);

        $this->assertEquals(100, $node->get('float_field')->getFieldDefinition()->getSetting('min'));
    }

    /** @test */
    public function max(): void
    {
        $field = FloatField::make('float_field')->max(1000);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'float_field' => 1,
        ]);

        $this->assertEquals(1000, $node->get('float_field')->getFieldDefinition()->getSetting('max'));
    }
}
