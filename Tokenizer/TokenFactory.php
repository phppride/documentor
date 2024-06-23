<?php

declare(strict_types=1);

namespace Phppride\Documentor\Tokenizer;

use Phppride\Documentor\Contracts\Tokenable;

final class TokenFactory
{
    private const NAME_PATTERN = '/(?<=<)[\/]?\w+|(?<=<!)([-]{2}|\w+)/';
    public function __construct(private readonly string $pattern) {}

    public function create(string $context, int $offset): Tokenable
    {
        if (preg_match($this->pattern, $context)) {
            preg_match_all(self::NAME_PATTERN, $context, $name, PREG_PATTERN_ORDER);
            return new Token($context, $offset, $name[0][0]);
        }

        return new Token($context, $offset, null);
    }
}
