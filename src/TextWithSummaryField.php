<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\TextFieldBase;

class TextWithSummaryField extends TextFieldBase
{
    public static function fieldType(): string
    {
        return 'text_with_summary';
    }

    public function summaryRequired(): self
    {
        return $this->setSetting('required_summary', true);
    }

    public function summaryNotRequired(): self
    {
        return $this->setSetting('required_summary', false);
    }

    public function displaySummary(): self
    {
        return $this->setSetting('display_summary', 1);
    }

    public function dontDisplaySummary(): self
    {
        return $this->setSetting('display_summary', 0);
    }
}
