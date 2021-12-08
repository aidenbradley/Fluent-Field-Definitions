<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\BooleanField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class BooleanFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @test */
    public function on_label(): void
    {
        $field = BooleanField::make('boolean_field')
            ->onLabel('We are on');

        $this->installField($field, 'node');

        $node = $this->createNode([
            'boolean_field' => 1,
        ]);

        $this->assertEquals(
            'We are on',
            $node->get('boolean_field')->getFieldDefinition()->getSetting('on_label')
        );
    }

    /** @test */
    public function off_label(): void
    {
        $field = BooleanField::make('boolean_field')
            ->offLabel('We are off');

        $this->installField($field, 'node');

        $node = $this->createNode([
            'boolean_field' => 1,
        ]);

        $this->assertEquals(
            'We are off',
            $node->get('boolean_field')->getFieldDefinition()->getSetting('off_label')
        );
    }
}
