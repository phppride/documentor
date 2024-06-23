<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Tokenizer;

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
                    mb_substr($this->context, $lastProcessedToken->getEndOffset(), $newToken->getOffset() - $lastProcessedToken->getEndOffset()),
                    $lastProcessedToken->getEndOffset())
                : $this->factory->create(
                    mb_substr($this->context, 0, $newToken->getOffset()),
                    0);
            $tokens[] = $lastProcessedToken = $lastToken = $newToken;
        }

        if ($end !== $lastToken->getEndOffset()) {
            $tokens[] = $this->factory->create(
                mb_substr($this->context, $lastToken->getEndOffset(), $end - $lastToken->getEndOffset()),
                $lastToken->getEndOffset()
            );
        }

        $key = array_key_first($tokens);

        if (!$key && empty($tokens[$key]->getContext())) {
            unset($tokens[$key]);
        }

        return array_values($tokens);
    }
}
