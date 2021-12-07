<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\StringField;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionKernelTestBase;

class StringFieldTest extends FluentFieldDefinitionKernelTestBase
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
    public function is_ascii(): void
    {
        $field = StringField::make('string_field')->isAscii();

        $this->installField($field);

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'string',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertTrue(
            $node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('is_ascii')
        );
    }

    /** @test */
    public function max_length(): void
    {
        $field = StringField::make('string_field')->maxLength(101);

        $this->installField($field);

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'string',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertEquals(
            101,
            $node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('max_length')
        );
    }

    /** @test */
    public function case_sensitive(): void
    {
        $field = StringField::make('string_field')->isCaseSensitive();

        $this->installField($field);

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'string',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertTrue($node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('case_sensitive'));
    }

    /** @test */
    public function not_case_sensitive(): void
    {
        $field = StringField::make('string_field')->notCaseSensitive();

        $this->installField($field);

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'string_field' => 'string',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertFalse($node->get('string_field')->getFieldDefinition()->getItemDefinition()->getSetting('case_sensitive'));
    }
}
