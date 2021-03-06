<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\FactoryMethod\Test;

use DesignPatterns\Creational\FactoryMethod\VeganMeal;
use DesignPatterns\Creational\FactoryMethod\VeganMealFactory;
use DesignPatterns\Creational\FactoryMethod\MealInterface;
use PHPUnit\Framework\TestCase;

final class VeganMealFactoryTest extends TestCase
{
    public function testCanCreateVeganMeal(): void
    {
        $meal = (new VeganMealFactory())->createMeal();

        $this->assertInstanceOf(MealInterface::class, $meal);
        $this->assertInstanceOf(VeganMeal::class, $meal);
    }
}
