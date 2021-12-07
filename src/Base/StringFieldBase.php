<?php

namespace Drupal\fluent_field_definitions\Base;

abstract class StringFieldBase extends FluentFieldDefinition
{
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
