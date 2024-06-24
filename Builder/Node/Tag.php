<?php

declare(strict_types=1);

namespace Phppride\Html5\Builder\Node;

use Phppride\Html5\Enums\TagType;
use Phppride\Documentor\Contracts\Elementable;

final class Tag extends AbstractNode implements Elementable
{
    public function __construct(
        private string $name,
        protected string $context,
        private string $type,
        protected int $offset
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): string
    {
        return $this->type;
    }
}
