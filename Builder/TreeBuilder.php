<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Builder;

use Hmrdevil\Html5\Builder\Node\TextNode;
use Hmrdevil\Html5\Contracts\Builder;
use Hmrdevil\Html5\Contracts\Document;
use Hmrdevil\Html5\Contracts\Elementable;
use Hmrdevil\Html5\Contracts\Node;
use Hmrdevil\Html5\Contracts\Specification;
use Hmrdevil\Html5\Contracts\Tokenable;
use Hmrdevil\Html5\Tokenizer\Parser;
use Hmrdevil\Html5\Tokenizer\Token;

class TreeBuilder implements Builder
{
    private ?Parser $parser;

    private array $nodes = [];

    public function __construct(
        private string $content,
        private string $mainPattern
    ) {
        $this->parser ??= new Parser($content);
    }

    public function build(): Document
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
        $offset = $token->getEndOffset();
        $length = $nextToken->getOffset() - $offset;
        $content = mb_substr($context, $offset, $length);

        return new TextNode(mb_substr($context, $offset, $length), $offset);
    }
}
