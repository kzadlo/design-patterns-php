<?php

declare(strict_types=1);

namespace DesignPatterns\Creational\AbstractFactory\Test;

use DesignPatterns\Creational\AbstractFactory\BreakfastInterface;
use DesignPatterns\Creational\AbstractFactory\DinnerInterface;
use DesignPatterns\Creational\AbstractFactory\AbstractMealFactory;
use DesignPatterns\Creational\AbstractFactory\VeganBreakfast;
use DesignPatterns\Creational\AbstractFactory\VeganDinner;
use DesignPatterns\Creational\AbstractFactory\VeganMealFactory;
use PHPUnit\Framework\TestCase;

final class VeganMealFactoryTest extends TestCase
{
    private AbstractMealFactory $veganMealFactory;

    protected function setUp(): void
    {
        $this->veganMealFactory = new VeganMealFactory();
    }

    public function testCanCreateVeganBreakfast(): void
    {
        $meal = $this->veganMealFactory->createBreakfast();

        $this->assertInstanceOf(VeganBreakfast::class, $meal);
        $this->assertInstanceOf(BreakfastInterface::class, $meal);
    }

    public function testCanCreateVeganDinner(): void
    {
        $meal = $this->veganMealFactory->createDinner();

        $this->assertInstanceOf(VeganDinner::class, $meal);
        $this->assertInstanceOf(DinnerInterface::class, $meal);
    }
}
