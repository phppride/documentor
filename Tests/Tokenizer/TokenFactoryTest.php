<?php

namespace Phppride\Documentor\Tests\Tokenizer;

use Phppride\Documentor\Tests\Providers\TokenDataProvider;
use Phppride\Documentor\Tokenizer\TokenFactory;
use Phppride\Documentor\Tokenizer\Token;
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
