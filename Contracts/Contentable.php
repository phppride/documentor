<?php

declare(strict_types=1);

namespace Phppride\Documentor\Contracts;

/**
 * An abstraction containing content
 */
interface Contentable
{
    /**
     * @return string   Containing content
     */
    public function getContent(): string;

    /**
     * @return int      Number of characters of the content
     */
    public function length(): int;
}
