<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

use Phppride\Documentor\Enums\TagType;

interface Elementable extends Node
{
    public function getName(): string;

    public function getType(): TagType;
}
