<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\TextWithSummaryField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class TextWithSummaryFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @var string[] */
    protected static $modules = [
        'text',
    ];

    /** @test */
    public function summary_required(): void
    {
        $field = TextWithSummaryField::make('summary_field')->summaryRequired();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'summary_field' => 'summary',
        ]);

        $this->assertTrue($node->get('summary_field')->getFieldDefinition()->getSetting('required_summary'));
    }

    /** @test */
    public function summary_not_required(): void
    {
        $field = TextWithSummaryField::make('summary_field')->summaryNotRequired();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'summary_field' => 'summary',
        ]);

        $this->assertFalse($node->get('summary_field')->getFieldDefinition()->getSetting('required_summary'));
    }

    /** @test */
    public function display_summary(): void
    {
        $field = TextWithSummaryField::make('summary_field')->displaySummary();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'summary_field' => 'summary',
        ]);

        $this->assertTrue(
            (bool) $node->get('summary_field')->getFieldDefinition()->getSetting('display_summary')
        );
    }

    /** @test */
    public function dont_display_summary(): void
    {
        $field = TextWithSummaryField::make('summary_field')->dontDisplaySummary();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'summary_field' => 'summary',
        ]);

        $this->assertFalse(
            (bool) $node->get('summary_field')->getFieldDefinition()->getSetting('display_summary')
        );
    }
}
