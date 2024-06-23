<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Contracts;

use Hmrdevil\Html5\Enums\TagType;

interface Elementable extends Node
{
    public function getName(): string;

    public function getType(): TagType;
}
