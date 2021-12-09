<?php

namespace Drupal\fluent_field_definitions\FormDisplay\Base;

abstract class FormDisplay
{
    /** @var int $weight */
    private $weight;

    /** @var string $displayType */
    private $displayType;

    /** @return static */
    public function setWeight(int $weight)
    {
        $this->weight = $weight;

        return $this;
    }

    /** @return static */
    public function setDisplayType(string $displayType)
    {
        $this->displayType = $displayType;

        return $this;
    }

    public function toArray(): array
    {
        return [
            'type' => $this->displayType,
            'weight' => $this->weight,
        ];
    }
}
