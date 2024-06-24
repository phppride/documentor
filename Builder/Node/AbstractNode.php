<?php

declare(strict_types=1);

namespace Phppride\Html5\Builder\Node;

use Phppride\Documentor\Contracts\Node;

abstract class AbstractNode implements Node
{
    public function offset(): int
    {
        return $this->offset;
    }

    public function length(): int
    {
        return $this->offset + mb_strlen($this->context);
    }

    public function getContent(): string
    {
        return $this->context;
    }
}
