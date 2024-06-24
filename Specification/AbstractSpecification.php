<?php

declare(strict_types=1);

namespace Phppride\Html5\Specification;

use Phppride\Documentor\Contracts\Specification;

abstract class AbstractSpecification implements Specification
{
    public function getName(): string
    {
        return self::NAME;
    }

    public function supportUserElements(): bool
    {
        return false;
    }
}
