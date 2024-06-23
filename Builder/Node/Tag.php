<?php

declare(strict_types=1);

namespace Phppride\Documentor\Builder\Node;

use Phppride\Documentor\Enums\TagType;
use Phppride\Documentor\Contracts\Elementable;

final class Tag extends AbstractNode implements Elementable
{
    public function __construct(
        private string $name,
        protected string $context,
        private TagType $type,
        protected int $offset
    ) {}

    public function getName(): string
    {
        return $this->name;
    }

    public function getType(): TagType
    {
        return $this->type;
    }
}
