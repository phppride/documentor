<?php

declare(strict_types=1);

namespace Phppride\Documentor\Rule;

enum RuleType: string
{
    case BUILD = 'build';
    case FIX = 'fix';
}
