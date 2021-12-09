<?php

namespace Drupal\fluent_field_definitions;

use Drupal\Core\StringTranslation\TranslatableMarkup;
use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class BooleanField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'boolean';
    }

    public function onLabel(string $value): self
    {
        return $this->setSetting('on_label', new TranslatableMarkup($value));
    }

    public function offLabel(string $value): self
    {
        return $this->setSetting('off_label', new TranslatableMarkup($value));
    }

    public function setFormDisplayOptions(\Closure $closure): self
    {
        $formDisplayOptions = $closure();

        $this->setDisplayOptions('form', $formDisplayOptions->toArray());

        return $this;
    }
}
