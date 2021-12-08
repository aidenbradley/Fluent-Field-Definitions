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

    public function enableDescriptionField(): self
    {
        $this->setSetting('description_field', 1);

        return $this;
    }

    public function disableDescriptionField(): self
    {
        $this->setSetting('description_field', 0);

        return $this;
    }

    public function fileStorageDirectory(string $directory): self
    {
        $this->setSetting('file_directory', $directory);

        return $this;
    }

    public function allowedFileExtensions(array $extensions): self
    {
        $this->setSetting('file_extensions', implode(' ', $extensions));

        return $this;
    }

    public function usePublicUriScheme(): self
    {
        $this->setUriScheme('public');

        return $this;
    }

    public function usePrivateUriScheme(): self
    {
        $this->setUriScheme('private');

        return $this;
    }

    public function setUriScheme(string $uriScheme): self
    {
        $this->setSetting('uri_scheme', $uriScheme);

        return $this;
    }

    public function maxFilesizeBytes(int $filesize): self
    {
        $this->setSetting('max_filesize', $filesize);

        return $this;
    }

    public function maxFilesizeKilobytes(int $filesize): self
    {
        $this->setSetting('max_filesize', $filesize . 'KB');

        return $this;
    }

    public function maxFilesizeMegabytes(int $filesize): self
    {
        $this->setSetting('max_filesize', $filesize . 'MB');

        return $this;
    }
}
