<?php

namespace Hmrdevil\Html5\Tests\Builder\Node;

use Hmrdevil\Html5\Builder\Node\TextNode;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class TextNodeTest extends TestCase
{
    #[DataProvider('provider')]
    public function testGetContent(?string $content, int $offset)
    {
        $this->assertEquals($content, (new TextNode($content, $offset))->getContext());
    }

    #[DataProvider('provider')]
    public function testGetOffset(?string $content, int $offset)
    {
        $this->assertEquals($offset, (new TextNode($content, $offset))->getOffset());
    }

    #[DataProvider('provider')]
    public function testGetEndOffset(?string $content, int $offset)
    {
        $this->assertEquals($offset + mb_strlen($content), (new TextNode($content, $offset))->getEndOffset());
    }

    public static function provider(): array
    {
        return [
            ['', 17],
            ['custom text', 27],
            ['text content', 999]
        ];
    }
}
