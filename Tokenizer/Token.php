<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Tokenizer;

use Hmrdevil\Html5\Builder\Node\AbstractNode;
use Hmrdevil\Html5\Contracts\Node;

final class Token extends AbstractNode implements Node
{
    public function __construct(
        protected readonly string $context,
        protected readonly int $offset,
        protected readonly ?string $tagname
    ) {}

    public function getTagname(): ?string
    {
        return $this->tagname;
    }
}
