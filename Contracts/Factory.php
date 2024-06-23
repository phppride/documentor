<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Contracts;

interface Factory
{
    public function create(Tokenable $token): Node;
}
