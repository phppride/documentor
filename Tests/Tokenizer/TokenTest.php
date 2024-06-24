<?php

namespace Phppride\Html5\Tests\Tokenizer;

use Phppride\Html5\Tests\Providers\TokenDataProvider;
use Phppride\Html5\Tokenizer\Token;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class TokenTest extends TestCase
{
    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetOffset(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($offset, (new Token($context, $offset, $tagname))->offset());
    }

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetContext(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($context, (new Token($context, $offset, $tagname))->getContent());
    }

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetEndOffset(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($offset + mb_strlen($context), (new Token($context, $offset, $tagname))->length());
    }

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetTagname(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($tagname, (new Token($context, $offset, $tagname))->getTagname());
    }
}
