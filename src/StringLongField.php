<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\StringFieldBase;

class StringLongField extends StringFieldBase
{
    public static function fieldType(): string
    {
        return 'string_long';
    }
}
