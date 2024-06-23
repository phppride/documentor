<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

interface Factory
{
    public function create(Tokenable $token): Node;
}
