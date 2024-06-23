<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

interface Rule
{
    public function check(): bool;
}
