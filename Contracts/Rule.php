<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Contracts;

interface Rule
{
    public function check(): bool;
}
