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
        $this->setSetting('link_type', LinkItemInterface::LINK_INTERNAL);

        return $this;
    }

    public function onlyExternalUrls(): self
    {
        $this->setSetting('link_type', LinkItemInterface::LINK_EXTERNAL);

        return $this;
    }

    public function internalAndExternalUrls(): self
    {
        $this->setSetting('link_type', LinkItemInterface::LINK_GENERIC);

        return $this;
    }

    public function linkTextDisabled(): self
    {
        $this->setSetting('title', DRUPAL_DISABLED);

        return $this;
    }

    public function linkTextOptional(): self
    {
        $this->setSetting('title', DRUPAL_OPTIONAL);

        return $this;
    }

    public function linkTextRequired(): self
    {
        $this->setSetting('title', DRUPAL_REQUIRED);

        return $this;
    }
}
