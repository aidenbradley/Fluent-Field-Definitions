<?php

namespace Drupal\fluent_field_definitions;

class ImageField extends FileField
{
    public static function fieldType(): string
    {
        return 'image';
    }

    public function maximumResolution(int $width, int $height): self
    {
        return $this->setSetting('max_resolution', $width . 'x' . $height);
    }

    public function minimumResolution(int $width, int $height): self
    {
        return $this->setSetting('min_resolution', $width . 'x' . $height);
    }

    public function altFieldRequired(): self
    {
        return $this->setSetting('alt_field_required', true);
    }

    public function altFieldNotRequired(): self
    {
        return $this->setSetting('alt_field_required', false);
    }

    public function titleFieldRequired(): self
    {
        return $this->setSetting('title_field_required', true);
    }

    public function titleFieldNotRequired(): self
    {
        return $this->setSetting('title_field_required', false);
    }
}
