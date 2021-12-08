<?php

namespace Drupal\fluent_field_definitions;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;

class EntityReferenceField extends FluentFieldDefinition
{
    public static function fieldType(): string
    {
        return 'entity_reference';
    }

    public function targetsEntityType(string $entityTypeId): self
    {
        $this->setTargetEntityTypeId($entityTypeId);

        return $this;
    }

    public function targetsBundle(string $bundle): self
    {
        $this->setTargetBundle($bundle);

        return $this;
    }
}
