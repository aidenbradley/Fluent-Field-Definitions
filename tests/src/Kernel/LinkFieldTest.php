<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\BooleanField;
use Drupal\fluent_field_definitions\LinkField;
use Drupal\link\LinkItemInterface;
use Drupal\node\Entity\Node;
use Drupal\node\Entity\NodeType;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionKernelTestBase;

class LinkFieldTest extends FluentFieldDefinitionKernelTestBase
{
    /** @var string[] */
    protected static $modules = [
        'node',
        'user',
        'fluent_field_definitions',
        'link',
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
    public function only_internal_urls(): void
    {
        $field = LinkField::make('link_field')->onlyInternalUrls();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'link_field' => '',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertEquals(
            LinkItemInterface::LINK_INTERNAL,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('link_type')
        );
    }

    /** @test */
    public function only_external_urls(): void
    {
        $field = LinkField::make('link_field')->onlyExternalUrls();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'link_field' => '',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertEquals(
            LinkItemInterface::LINK_EXTERNAL,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('link_type')
        );
    }

    /** @test */
    public function internal_and_external_urls(): void
    {
        $field = LinkField::make('link_field')->internalAndExternalUrls();

        $this->installField($field, 'node');

        $node = Node::create([
            'nid' => 1,
            'title' => 'test',
            'type' => 'page',
            'link_field' => '',
        ]);
        $node->save();
        $node = Node::load(1);

        $this->assertEquals(
            LinkItemInterface::LINK_GENERIC,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('link_type')
        );
    }
}
