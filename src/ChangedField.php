<?php

namespace Drupal\fluent_field_definitions;

class ChangedField extends TimestampField
{
    public static function fieldType(): string
    {
        return 'changed';
    }
}
