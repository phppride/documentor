<?php

declare(strict_types=1);

namespace Phppride\Documentor\Tests\Providers;

final class TokenDataProvider
{
    public static function provider(): array
    {
        return [
            ['<token>', 7, 'token'],
            ['I love PHPUnit', 16, null],
            ['< no token>', 23, null],
        ];
    }
}
