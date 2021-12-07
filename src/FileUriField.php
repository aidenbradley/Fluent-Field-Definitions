<?php

namespace Drupal\fluent_field_definitions;

class FileUriField extends UriField
{
    public static function fieldType(): string
    {
        return 'file_uri';
    }
}
