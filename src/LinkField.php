<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;
use Drupal\link\LinkItemInterface;

class LinkField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'link';
    }

    public function onlyInternalUrls(): self
    {
        return $this->setSetting('link_type', LinkItemInterface::LINK_INTERNAL);
    }

    public function onlyExternalUrls(): self
    {
        return $this->setSetting('link_type', LinkItemInterface::LINK_EXTERNAL);
    }

    public function internalAndExternalUrls(): self
    {
        return $this->setSetting('link_type', LinkItemInterface::LINK_GENERIC);
    }

    public function linkTextDisabled(): self
    {
        return $this->setSetting('title', DRUPAL_DISABLED);
    }

    public function linkTextOptional(): self
    {
        return $this->setSetting('title', DRUPAL_OPTIONAL);
    }

    public function linkTextRequired(): self
    {
        return $this->setSetting('title', DRUPAL_REQUIRED);
    }
}
