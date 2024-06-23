<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

use Phppride\Documentor\Rule\RuleType;

interface RuleSet
{
    public function getRules(RuleType $type): array;
}
