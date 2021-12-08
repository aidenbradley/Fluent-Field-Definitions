<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class DecimalField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'decimal';
    }

    public function precision(int $precision): self
    {
        if ($precision < 10 || $precision > 32) {
            return $this;
        }

        return $this->setSetting('precision', $precision);
    }

    public function scale(int $scale): self
    {
        if ($scale < 0 || $scale > 10) {
            return $this;
        }

        return $this->setSetting('scale', $scale);
    }
}
