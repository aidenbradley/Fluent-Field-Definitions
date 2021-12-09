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

    /** @return static */
    public function withConfigurableForm()
    {
        return $this->setDisplayConfigurable('form', true);
    }

    /** @return static */
    public function nonConfigurableForm()
    {
        return $this->setDisplayConfigurable('form', false);
    }

    /** @return static */
    abstract public function setFormDisplayOptions(\Closure $closure);

    /** @return static */
    public function withConfigurableView()
    {
        return $this->setDisplayConfigurable('view', true);
    }

    /** @return static */
    public function nonConfigurableView()
    {
        return $this->setDisplayConfigurable('view', false);
    }

    /** @return static */
    public function translatable()
    {
        return $this->setTranslatable(true);
    }

    /** @return static */
    public function notTranslatable()
    {
        return $this->setTranslatable(false);
    }

    /** @return static */
    public function revisionable()
    {
        return $this->setRevisionable(true);
    }

    /** @return static */
    public function notRevisionable()
    {
        return $this->setRevisionable(false);
    }

    /** @return static */
    public function setDefinitions()
    {
        return $this;
    }
}
