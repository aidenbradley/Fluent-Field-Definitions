<?php

namespace Drupal\fluent_field_definitions\FormDisplay;

use Drupal\fluent_field_definitions\FormDisplay\Base\FormDisplay;

class BooleanFormDisplay extends FormDisplay
{
    /** @var bool $displayLabel */
    private $displayLabel = true;

    public function setCheckboxDisplayType(): self
    {
        return $this->setDisplayType('boolean_checkbox');
    }

    public function displayLabel(): self
    {
        $this->displayLabel = true;

        return $this;
    }

    public function dontDisplayLabel(): self
    {
        $this->displayLabel = false;

        return $this;
    }

    public function toArray(): array
    {
        return array_merge(parent::toArray(), [
            'settings' => [
                'display_label' => $this->displayLabel,
            ],
        ]);
    }
}
