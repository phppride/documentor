<?php

declare(strict_types=1);

namespace Phppride\Html5\Tokenizer;

use Phppride\Html5\Builder\Node\AbstractNode;
use Phppride\Documentor\Contracts\Node;

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
