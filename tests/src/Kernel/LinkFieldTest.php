<?php

namespace Drupal\Tests\fluent_field_definitions\Kernel;

use Drupal\fluent_field_definitions\LinkField;
use Drupal\link\LinkItemInterface;
use Drupal\Tests\fluent_field_definitions\Kernel\Base\FluentFieldDefinitionNodeKernelTestBase;

class LinkFieldTest extends FluentFieldDefinitionNodeKernelTestBase
{
    /** @var string[] */
    protected static $modules = [
        'link'
    ];

    /** @test */
    public function only_internal_urls(): void
    {
        $field = LinkField::make('link_field')->onlyInternalUrls();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'link_field' => '',
        ]);

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

        $node = $this->createNode([
            'link_field' => '',
        ]);

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

        $node = $this->createNode([
            'link_field' => '',
        ]);

        $this->assertEquals(
            LinkItemInterface::LINK_GENERIC,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('link_type')
        );
    }

    /** @test */
    public function link_text_disabled(): void
    {
        $field = LinkField::make('link_field')->linkTextDisabled();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'link_field' => '',
        ]);

        $this->assertEquals(
            DRUPAL_DISABLED,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('title')
        );
    }

    /** @test */
    public function link_text_optional(): void
    {
        $field = LinkField::make('link_field')->linkTextOptional();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'link_field' => '',
        ]);

        $this->assertEquals(
            DRUPAL_OPTIONAL,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('title')
        );
    }

    /** @test */
    public function link_text_required(): void
    {
        $field = LinkField::make('link_field')->linkTextRequired();

        $this->installField($field, 'node');

        $node = $this->createNode([
            'link_field' => '',
        ]);

        $this->assertEquals(
            DRUPAL_REQUIRED,
            $node->get('link_field')->getFieldDefinition()->getItemDefinition()->getSetting('title')
        );
    }
}
