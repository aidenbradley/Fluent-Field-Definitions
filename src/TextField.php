<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\TextFieldBase;
use Drupal\fluent_field_definitions\Concerns\HasMaxLength;

class TextField extends TextFieldBase
{
    use HasMaxLength;

    public static function fieldType(): string
    {
        return 'text';
    }
}
