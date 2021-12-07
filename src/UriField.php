<?php

namespace Drupal\fluent_field_definitions;

class UriField extends StringField
{
    public static function fieldType(): string
    {
        return 'uri';
    }
}
