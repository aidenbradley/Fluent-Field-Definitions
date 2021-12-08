<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\datetime\Plugin\Field\FieldType\DateTimeItem;
use Drupal\fluent_field_definitions\DateTimeField;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class DateTimeFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    protected static $modules = [
        'datetime',
    ];

    /** @test */
    public function stores_date_only()
    {
        $field = DateTimeField::make('date_time_field')->storesDateOnly();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'date_time_field' => '',
        ]);

        $this->assertEquals(
            DateTimeItem::DATETIME_TYPE_DATE,
            $node->get('date_time_field')->getFieldDefinition()->getSetting('datetime_type')
        );
    }

    /** @test */
    public function stores_date_time_only()
    {
        $field = DateTimeField::make('date_time_field')->storesDateTimeOnly();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'date_time_field' => '',
        ]);

        $this->assertEquals(
            DateTimeItem::DATETIME_TYPE_DATETIME,
            $node->get('date_time_field')->getFieldDefinition()->getSetting('datetime_type')
        );
    }
}
