<?php

namespace Hmrdevil\Html5\Tests\Tokenizer;

use Hmrdevil\Html5\Tokenizer\Parser;
use PHPUnit\Framework\TestCase;
use PHPUnit\Framework\Attributes\DataProvider;

class ParserTest extends TestCase
{
    public function testParseNoTokens()
    {
        $content = 'Example text for scenario without tokens';

        $this->assertEmpty((new Parser($content, '/<[!?\w][\w\s="-:;А-яёЁ]*>|<\/\w+>/'))->parse());
    }

    #[DataProvider('provider')]
    public function testParseWithAvailableTokens(string $content, int $countTokens)
    {
        $this->assertCount($countTokens, (new Parser($content, '/<[!?\w][\w\s="-:;А-яёЁ]*>|<\/\w+>/'))->parse());
    }

    public static function provider(): array
    {
        return [
            [\file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . '../resources/example.html'), 38],
            ['<!token><!--token--></token><token>< not token><token some kind of content/>', 9]
        ];
    }
}
