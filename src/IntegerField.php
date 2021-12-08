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

    public function setSize(string $size): self
    {
        // need to figure out what Drupal expects and accepts here
        return $this->setSetting('size', $size);
    }
}
