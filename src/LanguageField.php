<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class LanguageField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'language';
    }
}
