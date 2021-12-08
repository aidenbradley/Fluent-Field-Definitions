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
        $this->setSetting('datetime_type', DateTimeItem::DATETIME_TYPE_DATE);

        return $this;
    }

    public function storesDateTimeOnly(): self
    {
        $this->setSetting('datetime_type', DateTimeItem::DATETIME_TYPE_DATETIME);

        return $this;
    }
}
