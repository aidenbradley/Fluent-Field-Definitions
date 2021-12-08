<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class MapField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'map';
    }
}
