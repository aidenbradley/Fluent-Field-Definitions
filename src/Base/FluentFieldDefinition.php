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
        $this->setDisplayConfigurable('form', true);

        return $this;
    }

    public function nonConfigurableForm(): self
    {
        $this->setDisplayConfigurable('form', false);

        return $this;
    }

    public function withConfigurableView(): self
    {
        $this->setDisplayConfigurable('view', true);

        return $this;
    }

    public function nonConfigurableView(): self
    {
        $this->setDisplayConfigurable('view', false);

        return $this;
    }

    public function setDefinitions(): self
    {
        return $this;
    }
}
