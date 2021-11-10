<?php

namespace Drupal\fluent_field_definitions\Base;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\StringTranslation\TranslatableMarkup;

abstract class FluentFieldDefinition extends BaseFieldDefinition
{
    abstract public static function fieldType(): string;

    public static function make(): self
    {
        return self::create(static::fieldType())->setDefinitions();
    }

    public function setLabel($label)
    {
        return parent::setLabel(
            new TranslatableMarkup($label)
        );
    }

    public function withConfigurableForm(): self
    {
        $this->setDisplayConfigurable('form', true);

        return $this;
    }

    public function withConfigurableView(): self
    {
        $this->setDisplayConfigurable('view', true);

        return $this;
    }

    public function setDefinitions(): self
    {
        return $this;
    }
}
