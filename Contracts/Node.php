<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Contracts;

interface Node extends Tokenable
{
    public function getOffset(): int;

    public function getEndOffset(): int;
}
