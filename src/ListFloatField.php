<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\ListItemFieldBase;

class ListFloatField extends ListItemFieldBase
{
    public static function fieldType(): string
    {
        return 'list_float';
    }
}
