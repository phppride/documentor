<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Builder\Node;

use Hmrdevil\Html5\Contracts\Node;

abstract class AbstractNode implements Node
{
    public function getOffset(): int
    {
        return $this->offset;
    }

    public function getEndOffset(): int
    {
        return $this->offset + mb_strlen($this->context);
    }

    public function getContext(): string
    {
        return $this->context;
    }
}
