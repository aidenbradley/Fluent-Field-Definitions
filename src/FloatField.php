<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class FloatField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'float';
    }

    public function min(int $min): self
    {
        return $this->setSetting('min', $min);
    }

    public function max(int $max): self
    {
        return $this->setSetting('max', $max);
    }
}
