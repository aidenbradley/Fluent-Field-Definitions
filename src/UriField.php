<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Concerns\HasMaxLength;

class UriField extends StringField
{
    use HasMaxLength;

    public static function fieldType(): string
    {
        return 'uri';
    }
}
