<?php

namespace Hmrdevil\Html5\Tests\Tokenizer;

use Hmrdevil\Html5\Tests\Providers\TokenDataProvider;
use Hmrdevil\Html5\Tokenizer\TokenFactory;
use Hmrdevil\Html5\Tokenizer\Token;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProviderExternal;

class TokenFactoryTest extends TestCase
{
    private string $pattern = '/(?<=<)[\/]?\w+|(?<=<!)([-]{2}|\w+)/';

    #[DataProviderExternal(TokenDataProvider::class, 'provider')]
    public function testCreate(string $text, int $offset, ?string $tagname)
    {
        $result = (new TokenFactory($this->pattern))->create($text, $offset);

        $this->assertInstanceOf(Token::class, $result);
        $this->assertEquals($offset, $result->getOffset());
        $this->assertEquals($tagname, $result->getTagname());
    }
}
