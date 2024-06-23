<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

interface Node extends Tokenable
{
    public function getOffset(): int;

    public function getEndOffset(): int;
}
