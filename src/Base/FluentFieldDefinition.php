<?php

namespace Drupal\fluent_field_definitions\Base;

use Drupal\Core\Field\BaseFieldDefinition;
use Drupal\Core\StringTranslation\TranslatableMarkup;

abstract class FluentFieldDefinition extends BaseFieldDefinition
{
    abstract public static function fieldType(): string;

    /** @return static */
    public static function make(?string $name = null)
    {
        $field = static::create(static::fieldType());

        if ($name !== null) {
            $field->setName($name);
        }

        return $field;
    }

    public function setLabel($label)
    {
        return parent::setLabel(
            new TranslatableMarkup($label)
        );
    }

    public function withConfigurableForm(): self
    {
        return $this->setDisplayConfigurable('form', true);
    }

    public function nonConfigurableForm(): self
    {
        return $this->setDisplayConfigurable('form', false);
    }

    public function withConfigurableView(): self
    {
        return $this->setDisplayConfigurable('view', true);
    }

    public function nonConfigurableView(): self
    {
        return $this->setDisplayConfigurable('view', false);
    }

    public function translatable(): self
    {
        return $this->setTranslatable(true);
    }

    public function notTranslatable(): self
    {
        return $this->setTranslatable(false);
    }

    public function revisionable(): self
    {
        return $this->setRevisionable(true);
    }

    public function notRevisionable(): self
    {
        return $this->setRevisionable(false);
    }

    public function setDefinitions(): self
    {
        return $this;
    }
}
