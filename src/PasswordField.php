<?php

namespace Drupal\fluent_field_definitions;

class PasswordField extends StringField
{
    public static function fieldType(): string
    {
        return 'password';
    }
}
