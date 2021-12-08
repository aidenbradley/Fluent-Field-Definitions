<?php

namespace Drupal\fluent_field_definitions\Base;

abstract class StringFieldBase extends FluentFieldDefinition
{
    public function isCaseSensitive(): self
    {
        return $this->setSetting('case_sensitive', true);
    }

    public function notCaseSensitive(): self
    {
        return $this->setSetting('case_sensitive', false);
    }
}
