<?php

declare(strict_types=1);

namespace Phppride\Documentor\Builder;

use Phppride\Documentor\Builder\Node\TextNode;
use Phppride\Documentor\Contracts\Builderable;
use Phppride\Documentor\Contracts\Documentable;
use Phppride\Documentor\Contracts\Elementable;
use Phppride\Documentor\Contracts\Node;
use Phppride\Documentor\Contracts\Specification;
use Phppride\Documentor\Contracts\Tokenable;
use Phppride\Documentor\Tokenizer\Parser;
use Phppride\Documentor\Tokenizer\Token;

class TreeBuilder implements Builderable
{
    private ?Parser $parser;

    private array $nodes = [];

    public function __construct(
        private string $content,
        private string $mainPattern
    ) {
        $this->parser ??= new Parser($content);
    }

    public function build(): Documentable
    {
        $result = $this->buildTree($this->parser->parse(), $this->content);
    }

    private function buildTree(array $tokens, string $context): array
    {
        foreach ($tokens as $token) {
            $nextToken = next($tokens);
            $this->nodes[] = $this->buildNode($token, $nextToken, $context);
        }

        return $this->nodes;
    }

    private function buildNode(Token $token, Token|bool $nextToken, string $context): array
    {
        $nodes[] = $this->buildElement($token, $nextToken, $context);
        if ($nextToken) {
            $nodes[] = $this->buildTextNode($token, $nextToken, $context);
        }

        return $nodes;
    }

    private function buildElement(Token $token, Token|bool $nextToken, string $context): Elementable
    {

    }

    private function buildTextNode(Token $token, Token $nextToken, string $context): TextNode
    {
        $offset = $token->length();
        $length = $nextToken->offset() - $offset;
        $content = mb_substr($context, $offset, $length);

        return new TextNode(mb_substr($context, $offset, $length), $offset);
    }
}
