<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class PathField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'path';
    }
}
