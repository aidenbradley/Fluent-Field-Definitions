<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\DecimalField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class DecimalFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @test */
    public function precision(): void
    {
        $field = DecimalField::make('decimal_field')->precision(20);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'decimal_field' => 1,
        ]);

        $this->assertEquals(20, $node->get('decimal_field')->getFieldDefinition()->getSetting('precision'));
    }

    /**
     * @test
     * precision must be above 10
     */
    public function validates_precision_below_10()
    {
        $field = DecimalField::make('decimal_field')->precision(9);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'decimal_field' => 1,
        ]);

        // Drupal will use the default storage settings for precision if one is not set, which is set to 10.
        $this->assertEquals(10, $node->get('decimal_field')->getFieldDefinition()->getSetting('precision'));
    }

    /**
     * @test
     * precision must be below 10
     */
    public function validates_precision_above_32()
    {
        $field = DecimalField::make('decimal_field')->precision(33);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'decimal_field' => 1,
        ]);

        // Drupal will use the default storage settings for precision if one is not set, which is set to 10.
        $this->assertEquals(10, $node->get('decimal_field')->getFieldDefinition()->getSetting('precision'));
    }

    /** @test */
    public function scale(): void
    {
        $field = DecimalField::make('decimal_field')->scale(5);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'decimal_field' => 1,
        ]);

        $this->assertEquals(5, $node->get('decimal_field')->getFieldDefinition()->getSetting('scale'));
    }

    /**
     * @test
     * scale must be above -1
     */
    public function validates_scale_below_0()
    {
        $field = DecimalField::make('decimal_field')->scale(-1);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'decimal_field' => 1,
        ]);

        // Drupal will use the default storage settings for scale if one is not set, which is set to 2.
        $this->assertEquals(2, $node->get('decimal_field')->getFieldDefinition()->getSetting('scale'));
    }

    /**
     * @test
     * scale must be below 11
     */
    public function validates_scale_above_10()
    {
        $field = DecimalField::make('decimal_field')->scale(11);

        $this->installField($field, 'node');

        $node = $this->createNode([
            'decimal_field' => 1,
        ]);

        // Drupal will use the default storage settings for scale if one is not set, which is set to 2.
        $this->assertEquals(2, $node->get('decimal_field')->getFieldDefinition()->getSetting('scale'));
    }
}
