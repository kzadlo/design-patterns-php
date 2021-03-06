<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

interface DinnerInterface
{
    public function canBePackedInGlassContainer(): bool;
}
