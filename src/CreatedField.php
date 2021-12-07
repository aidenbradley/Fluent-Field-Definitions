<?php

namespace Drupal\fluent_field_definitions;

class CreatedField extends TimestampField
{
    public static function fieldType(): string
    {
        return 'created';
    }
}
