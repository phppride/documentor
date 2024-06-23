<?php

declare(strict_types=1);

namespace Phppride\Documentor\Builder\Node;

use Phppride\Documentor\Contracts\Node;

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
