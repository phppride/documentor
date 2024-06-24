<?php

namespace Phppride\Html5\Tests\Builder\Node;

use Phppride\Html5\Builder\Node\Tag;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class TagTest extends TestCase
{

    #[DataProvider('provider')]
    public function testGetName(string $name, string $context, string $type, int $offset)
    {
        $this->assertEquals($name, (new Tag($name, $context, $type, $offset))->getName());
    }

    #[DataProvider('provider')]
    public function testGetOffset(string $name, string $context, string $type, int $offset)
    {
        $this->assertEquals($offset, (new Tag($name, $context, $type, $offset))->offset());
    }

    #[DataProvider('provider')]
    public function testGetType(string $name, string $context, string $type, int $offset)
    {
        $this->assertEquals($type, (new Tag($name, $context, $type, $offset))->getType());
    }

    #[DataProvider('provider')]
    public function testGetContext(string $name, string $context, string $type, int $offset)
    {
        $this->assertEquals($context, (new Tag($name, $context, $type, $offset))->content());
    }

    #[DataProvider('provider')]
    public function testGetEndOffset(string $name, string $context, string $type, int $offset)
    {
        $this->assertEquals($offset + mb_strlen($context), (new Tag($name, $context, $type, $offset))->length());
    }

    public static function provider(): array
    {
        return [
            ['tag', 'context', 'OPENER', 0],
            ['tag', 'text context', 'CLOSING', 17],
            ['tag', 'custom context', 'SELF_CLOSING', 685],
        ];
    }
}
