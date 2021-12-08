<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel\Base;

use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;

abstract class FluentFieldDefinitionNodeKernelTestBase extends FluentFieldDefinitionKernelTestBase
{
    protected function setUp(): void
    {
        parent::setUp();

        $this->enableModules([
            'node',
            'user',
        ]);

        $this->installEntitySchema('node');
        $this->installEntitySchema('user');

        NodeType::create([
            'name' => 'page',
            'type' => 'page',
        ])->save();
    }

    protected function createNode(array $values = []): Node
    {
        $nodeValues = array_merge([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
        ], $values);

        $node = Node::create($nodeValues);

        $node->save();

        return Node::load(1);
    }
}
