<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Contracts;

use Hmrdevil\Html5\Rule\RuleType;

interface RuleSet
{
    public function getRules(RuleType $type): array;
}
