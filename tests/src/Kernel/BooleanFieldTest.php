<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\Core\Cache\UseCacheBackendTrait;
use Drupal\fluent_field_definitions\Base\FluentFieldDefinition;
use Drupal\fluent_field_definitions\BooleanField;
use Drupal\KernelTests\KernelTestBase;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\Tests\system\Functional\Entity\Traits\EntityDefinitionTestTrait;

class BooleanFieldTest extends KernelTestBase
{
    use EntityDefinitionTestTrait,
        UseCacheBackendTrait;

    /** @var string[] */
    protected static $modules = [
        'system',
        'node',
        'user',
        'fluent_field_definitions',
        'field',
    ];

    /** @var \Drupal\Core\Entity\EntityDefinitionUpdateManager */
    protected $entityDefinitionUpdateManager;

    /** @var \Drupal\Core\Entity\EntityTypeManager */
    protected $entityTypeManager;

    /** @var \Drupal\Core\Entity\EntityFieldManager */
    protected $entityFieldManager;

    /** @var \Drupal\Core\Database\Connection */
    protected $database;

    protected $state;

    protected function setUp(): void
    {
        parent::setUp();

        $this->installEntitySchema('node');
        $this->installEntitySchema('user');

        $this->installSchema('system', 'sequences');

        $this->installConfig('field');

        $this->entityDefinitionUpdateManager = $this->container->get('entity.definition_update_manager');
        $this->entityTypeManager = $this->container->get('entity_type.manager');
        $this->entityFieldManager = $this->container->get('entity_field.manager');
        $this->database = $this->container->get('database');
        $this->state = $this->container->get('state');
        $this->cacheBackend = $this->container->get('cache.discovery');

        NodeType::create([
            'name' => 'page',
            'type' => 'page',
        ])->save();
    }

    /** @test */
    public function on_label(): void
    {
        $field = BooleanField::make('boolean_field')
            ->onLabel('We are on');

        $this->addFieldDefinition($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'boolean_field' => 1,
        ]);
        $node->save();
        $node = Node::load(1);
    }

    private function addFieldDefinition(FluentFieldDefinition $field, string $entityType): void
    {
        $this->entityDefinitionUpdateManager->installFieldStorageDefinition(
            $field->getName(),
            $entityType,
            'fluent_field_definitions',
            $field,
        );

        $entityTypeDefinition = $this->entityTypeManager->getDefinition($entityType);

        $this->assertTrue(
            $this->database->schema()->fieldExists($entityTypeDefinition->getDataTable(), $field->getName())
        );
    }
}
