<?php

namespace Phppride\Html5\Tests\Tokenizer;

use Phppride\Html5\Tests\Providers\TokenDataProvider;
use Phppride\Html5\Tokenizer\TokenFactory;
use Phppride\Html5\Tokenizer\Token;
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
        $this->assertEquals($offset, $result->offset());
        $this->assertEquals($tagname, $result->getTagname());
    }
}
