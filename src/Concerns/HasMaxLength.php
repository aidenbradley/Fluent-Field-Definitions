<?php

namespace Drupal\fluent_field_definitions\Concerns;

trait HasMaxLength
{
    /** @return static */
    public function maxLength(int $length)
    {
        return $this->setSetting('max_length', $length);
    }
}
