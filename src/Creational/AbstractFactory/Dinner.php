<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory;

interface Dinner
{
    public function canBePackedInGlassContainer(): bool;
}
