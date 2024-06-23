<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Specification;

use Hmrdevil\Html5\Contracts\Specification;

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
