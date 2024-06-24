<?php

declare(strict_types=1);

namespace Phppride\Html5\Tokenizer;

final class Parser
{
    public function __construct(
        private readonly string $context,
        private readonly string $pattern
    ) {}

    private ?TokenFactory $factory;

    public function parse(): array
    {
        $end = mb_strlen($this->context);
        if (0 === $end) {
            return [];
        }

        $offset = 0;
        $tokens = [];
        $lastToken = '';
        $this->factory ??= new TokenFactory($this->pattern);
        \preg_match_all(
            $this->pattern,
            $this->context,
            $tokenStrings,
            PREG_PATTERN_ORDER
        );
        if (empty($tokenStrings[0])) {
            return [];
        }

        foreach ($tokenStrings[0] as $tokenContext) {
            $offset = mb_stripos($this->context, $tokenContext, $offset);
            $newToken = $this->factory->create($tokenContext, $offset);
            $offset += mb_strlen($tokenContext);
            $tokens[] = isset($lastProcessedToken)
                ? $this->factory->create(
                    mb_substr($this->context, $lastProcessedToken->length(), $newToken->offset() - $lastProcessedToken->length()),
                    $lastProcessedToken->length())
                : $this->factory->create(
                    mb_substr($this->context, 0, $newToken->offset()),
                    0);
            $tokens[] = $lastProcessedToken = $lastToken = $newToken;
        }

        if ($end !== $lastToken->length()) {
            $tokens[] = $this->factory->create(
                mb_substr($this->context, $lastToken->length(), $end - $lastToken->length()),
                $lastToken->length()
            );
        }

        $key = array_key_first($tokens);

        if (!$key && empty($tokens[$key]->content())) {
            unset($tokens[$key]);
        }

        return array_values($tokens);
    }
}
