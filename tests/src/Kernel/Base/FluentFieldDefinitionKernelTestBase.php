<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel\Base;

use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;
use Drupal\KernelTests\KernelTestBase;

abstract class FluentFieldDefinitionKernelTestBase extends KernelTestBase
{
    protected function setUp()
    {
        parent::setUp();

        $this->enableModules([
            'fluent_field_definitions_test',
            'system',
            'field',
        ]);

        $this->installSchema('system', 'sequences');

        $this->installConfig('field');
    }

    protected function installField(FluentFieldDefinition $field, string $entityType): void
    {
        $this->container->get('state')->set('fluent_field_definitions_test.field_to_install', serialize($field));
    }
}
