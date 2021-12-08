<?php

namespace Drupal\fluent_field_definitions;

use Drupal\datetime\Plugin\Field\FieldType\DateTimeItem;
use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class DateTimeField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'datetime';
    }

    public function storesDateOnly(): self
    {
        return $this->setSetting('datetime_type', DateTimeItem::DATETIME_TYPE_DATE);
    }

    public function storesDateTimeOnly(): self
    {
        return $this->setSetting('datetime_type', DateTimeItem::DATETIME_TYPE_DATETIME);
    }
}
