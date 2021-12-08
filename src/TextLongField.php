<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\TextFieldBase;

class TextLongField extends TextFieldBase
{
    public static function fieldType(): string
    {
        return 'text_long';
    }
}
