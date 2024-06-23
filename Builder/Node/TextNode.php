<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Builder\Node;

use Hmrdevil\Html5\Contracts\Node;

final class TextNode extends AbstractNode implements Node
{
    public function __construct(
        protected string $context,
        protected int $offset
    ) {}
}
