<?php

namespace Drupal\fluent_field_definitions;

class DateRangeField extends DateTimeField
{
    public static function fieldType(): string
    {
        return 'daterange';
    }
}
