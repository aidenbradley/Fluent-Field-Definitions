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
        return $this->setTargetEntityTypeId($entityTypeId);
    }

    public function targetsBundle(string $bundle): self
    {
        return $this->setTargetBundle($bundle);
    }
}
