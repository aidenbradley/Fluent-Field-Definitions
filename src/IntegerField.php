<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class IntegerField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'integer';
    }

    public function isUnsigned(): self
    {
        return $this->setSetting('unsigned', true);
    }

    public function notUnsigned(): self
    {
        return $this->setSetting('unsigned', false);
    }

    public function tinySize(): self
    {
        return $this->setSetting('size', 'tiny');
    }

    public function smallSize(): self
    {
        return $this->setSetting('size', 'small');
    }

    public function mediumSize(): self
    {
        return $this->setSetting('size', 'medium');
    }

    public function normalSize(): self
    {
        return $this->setSetting('size', 'normal');
    }

    public function bigSize(): self
    {
        return $this->setSetting('size', 'big');
    }
}
