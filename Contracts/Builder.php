<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

interface Builder
{
    public function build(): Documentable;
}
