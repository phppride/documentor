<?php

declare(strict_types=1);

namespace Phppride\Documentor\Enums;

enum TagType: int
{
    case OPENER = 0;
    case CLOSING = 1;

    case SELF_CLOSING = 2;
}
