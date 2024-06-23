<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Builder\Node;

use Hmrdevil\Html5\Enums\TagType;
use Hmrdevil\Html5\Contracts\Elementable;

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
