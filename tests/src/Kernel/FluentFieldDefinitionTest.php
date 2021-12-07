<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\StringField;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionKernelTestBase;

class FluentFieldDefinitionTest extends FluentFieldDefinitionKernelTestBase
{
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
    public function set_label()
    {
        $field = StringField::make('string_field')
            ->setLabel('This is my label');

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'test',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertEquals(
            'This is my label',
            $node->get('string_field')->getFieldDefinition()->getLabel()
        );
    }

    /** @test */
    public function with_configurable_form(): void
    {
        $field = StringField::make('string_field')
            ->withConfigurableForm();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'test',
        ]);
        $node->save();

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('form'));
    }

    /** @test */
    public function non_configurable_form(): void
    {
        $field = StringField::make('string_field')
            ->nonConfigurableForm();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'test',
        ]);
        $node->save();

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('form'));
    }

    /** @test */
    public function with_configurable_view(): void
    {
        $field = StringField::make('string_field')
            ->withConfigurableView();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'test',
        ]);
        $node->save();

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('view'));
    }

    /** @test */
    public function non_configurable_view(): void
    {
        $field = StringField::make('string_field')
            ->nonConfigurableView();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'test',
        ]);
        $node->save();

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->isDisplayConfigurable('view'));
    }
}
