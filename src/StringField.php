<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\StringFieldBase;
use Drupal\fluent_field_definitions\Concerns\HasMaxLength;

class StringField extends StringFieldBase
{
    use HasMaxLength;

    public static function fieldType(): string
    {
        return 'string';
    }

    public function isAscii(): self
    {
        $this->setSetting('is_ascii', true);

        return $this;
    }
}
