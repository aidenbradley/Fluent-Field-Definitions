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
        $this->setSetting('required_summary', true);

        return $this;
    }

    public function summaryNotRequired(): self
    {
        $this->setSetting('required_summary', false);

        return $this;
    }

    public function displaySummary(): self
    {
        $this->setSetting('display_summary', 1);

        return $this;
    }

    public function dontDisplaySummary(): self
    {
        $this->setSetting('display_summary', 0);

        return $this;
    }
}
