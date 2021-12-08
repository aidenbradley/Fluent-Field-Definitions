<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class FileField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'file';
    }

    public function enableDisplayField(): self
    {
        $this->setSetting('display_field', true);

        return $this;
    }

    /** This option only works if the display field is enabled */
    public function enableDisplayDefault(): self
    {
        $this->setSetting('display_default', true);

        return $this;
    }

    public function allowedFileExtensions(array $extensions): self
    {
        $this->setSetting('file_extensions', implode(' ', $extensions));

        return $this;
    }
}
