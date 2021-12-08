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
        return $this->setSetting('display_field', true);
    }

    /** This option only works if the display field is enabled */
    public function enableDisplayDefault(): self
    {
        return $this->setSetting('display_default', true);
    }

    public function enableDescriptionField(): self
    {
        return $this->setSetting('description_field', 1);
    }

    public function disableDescriptionField(): self
    {
        return $this->setSetting('description_field', 0);
    }

    public function fileStorageDirectory(string $directory): self
    {
        return $this->setSetting('file_directory', $directory);
    }

    public function allowedFileExtensions(array $extensions): self
    {
        return $this->setSetting('file_extensions', implode(' ', $extensions));
    }

    public function usePublicUriScheme(): self
    {
        return $this->setUriScheme('public');
    }

    public function usePrivateUriScheme(): self
    {
        return $this->setUriScheme('private');
    }

    public function setUriScheme(string $uriScheme): self
    {
        return $this->setSetting('uri_scheme', $uriScheme);
    }

    public function maxFilesizeBytes(int $filesize): self
    {
        return $this->setSetting('max_filesize', $filesize);
    }

    public function maxFilesizeKilobytes(int $filesize): self
    {
        return $this->setSetting('max_filesize', $filesize . 'KB');
    }

    public function maxFilesizeMegabytes(int $filesize): self
    {
        return $this->setSetting('max_filesize', $filesize . 'MB');
    }
}
