<?php

declare(strict_types=1);

namespace Phppride\Html5\Enums;

enum TagType: int
{
    case OPENER = 0;
    case CLOSING = 1;

    case SELF_CLOSING = 2;
}
