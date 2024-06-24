<?php

declare(strict_types=1);

namespace Phppride\Html5\Builder\Node;

use Phppride\Documentor\Contracts\Node;

final class TextNode extends AbstractNode implements Node
{
    public function __construct(
        protected string $context,
        protected int $offset
    ) {}
}
