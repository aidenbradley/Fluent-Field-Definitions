<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class StringField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'string';
    }

    public function isAscii(): self
    {
        $this->setSetting('is_ascii', true);

        return $this;
    }

    public function maxLength(int $length): self
    {
        $this->setSetting('max_length', $length);

        return $this;
    }

    public function isCaseSensitive(): self
    {
        $this->setSetting('case_sensitive', true);

        return $this;
    }

    public function notCaseSensitive(): self
    {
        $this->setSetting('case_sensitive', false);

        return $this;
    }
}
