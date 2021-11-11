<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\BooleanField;
use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;
use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;

class BooleanFieldTest extends KernelTestBase
{
    /** @var string[] */
    protected static $modules = [
        'system',
        'node',
        'user',
        'fluent_field_definitions',
    ];

    protected $entityDefinitionUpdateManager;

    protected $entityFieldManager;

    protected $database;

    protected function setUp()
    {
        parent::setUp();

        $this->entityDefinitionUpdateManager = $this->container->get('entity.definition_update_manager');
        $this->entityFieldManager = $this->container->get('entity_field.manager');
        $this->database = $this->container->get('database');

        $this->installEntitySchema('node');
        $this->installEntitySchema('user');

        NodeType::create([
            'type' => 'page',
            'name' => 'page',
        ])->save();
    }

    /** @test */
    public function on_label(): void
    {
        $field = BooleanField::make()
            ->setName('boolean_field')
            ->onLabel('We are on');

        $this->addFieldDefinition($field, 'node');

        $node = Node::create([
            'title' => 'Boolean test',
            'type' => 'page',
            'boolean_field' => 0,
        ]);
        $node->save();

        $entityFieldManager = \Drupal::service('entity_field.manager');
        $fields = $entityFieldManager->getFieldDefinitions('node', 'page');

        dump(array_keys($fields));

//        dump($node->get($field->getName())->getValue());
    }

    private function addFieldDefinition(FluentFieldDefinition $field, string $entityType): void
    {
        $this->entityDefinitionUpdateManager->installFieldStorageDefinition(
            $field->getName(),
            $entityType,
            $entityType,
            $field
        );

        $this->assertTrue(
            $this->database->schema()->fieldExists('node', $field->getName())
        );
    }
}
