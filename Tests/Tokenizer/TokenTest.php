<?php

namespace Phppride\Documentor\Tests\Tokenizer;

use Phppride\Documentor\Tests\Providers\TokenDataProvider;
use Phppride\Documentor\Tokenizer\Token;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class TokenTest extends TestCase
{
    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetOffset(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($offset, (new Token($context, $offset, $tagname))->getOffset());
    }

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetContext(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($context, (new Token($context, $offset, $tagname))->getContext());
    }

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetEndOffset(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($offset + mb_strlen($context), (new Token($context, $offset, $tagname))->getEndOffset());
    }

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testGetTagname(string $context, int $offset, ?string $tagname)
    {
        $this->assertEquals($tagname, (new Token($context, $offset, $tagname))->getTagname());
    }
}
