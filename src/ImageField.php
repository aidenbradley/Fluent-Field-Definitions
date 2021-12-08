<?php

namespace Drupal\fluent_field_definitions;

class ImageField extends FileField
{
    public static function fieldType(): string
    {
        return 'image';
    }
}
