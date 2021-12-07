<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\StringFieldBase;

class StringField extends StringFieldBase
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
}
