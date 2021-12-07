<?php

namespace Drupal\fluent_field_definitions;

class UuidField extends StringField
{
    public static function fieldType(): string
    {
        return 'uuid';
    }
}
