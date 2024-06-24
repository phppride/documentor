<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

interface Tokenable
{
    public function getContent(): string;
}
