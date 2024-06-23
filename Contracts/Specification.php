<?php

declare(strict_types=1);

namespace Hmrdevil\Html5\Contracts;

interface Specification
{
    public function getMainPattern(): string;

    public function getName(): string;

    public function getElements(): array;

    public function getRulesForElement(string $name): array;

    public function supportUserElements(): bool;
}
