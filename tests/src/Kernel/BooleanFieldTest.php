<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\Core\Cache\UseCacheBackendTrait;
use Drupal\fluent_field_definitions\BooleanField;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionKernelTestBase;
use Drupal\Tests\system\Functional\Entity\Traits\EntityDefinitionTestTrait;

class BooleanFieldTest extends FluentFieldDefinitionKernelTestBase
{
    use EntityDefinitionTestTrait,
        UseCacheBackendTrait;

    /** @var string[] */
    protected static $modules = [
        'node',
        'user',
        'fluent_field_definitions',
    ];

    protected function setUp(): void
    {
        parent::setUp();

        $this->installEntitySchema('node');
        $this->installEntitySchema('user');

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

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'boolean_field' => 1,
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertEquals(
            'We are on',
            $node->get('boolean_field')->getFieldDefinition()->getSetting('on_label')
        );
    }
}
