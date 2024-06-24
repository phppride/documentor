<?php

namespace Phppride\Documentor\Tests\Builder\Node;

use Phppride\Documentor\Builder\Node\Tag;
use Phppride\Documentor\Enums\TagType;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class TagTest extends TestCase
{

    #[DataProvider('provider')]
    public function testGetName(string $name, string $context, TagType $type, int $offset)
    {
        $this->assertEquals($name, (new Tag($name, $context, $type, $offset))->getName());
    }

    #[DataProvider('provider')]
    public function testGetOffset(string $name, string $context, TagType $type, int $offset)
    {
        $this->assertEquals($offset, (new Tag($name, $context, $type, $offset))->offset());
    }

    #[DataProvider('provider')]
    public function testGetType(string $name, string $context, TagType $type, int $offset)
    {
        $this->assertEquals($type, (new Tag($name, $context, $type, $offset))->getType());
    }

    #[DataProvider('provider')]
    public function testGetContext(string $name, string $context, TagType $type, int $offset)
    {
        $this->assertEquals($context, (new Tag($name, $context, $type, $offset))->getContext());
    }

    #[DataProvider('provider')]
    public function testGetEndOffset(string $name, string $context, TagType $type, int $offset)
    {
        $this->assertEquals($offset + mb_strlen($context), (new Tag($name, $context, $type, $offset))->length());
    }

    public static function provider(): array
    {
        return [
            ['tag', 'context', TagType::OPENER, 0],
            ['tag', 'text context', TagType::CLOSING, 17],
            ['tag', 'custom context', TagType::SELF_CLOSING, 685],
        ];
    }
}
