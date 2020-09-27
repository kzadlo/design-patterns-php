<?php

declare(strict_types=1);

namespace DesignPatterns\Structural\Bridge\Test;

use DesignPatterns\Structural\Bridge\Junior;
use DesignPatterns\Structural\Bridge\Senior;
use DesignPatterns\Structural\Bridge\TrainingBudget;
use PHPUnit\Framework\TestCase;

class TrainingBudgetTest extends TestCase
{
    public function testCalculatingGrantForJunior(): void
    {
        $trainingBudgetJuniorGrant = 900.00;

        $trainingBudget = new TrainingBudget(new Junior());

        $this->assertSame($trainingBudgetJuniorGrant, $trainingBudget->calculateGrant());
    }

    public function testCalculatingGrantForSenior(): void
    {
        $trainingBudgetSeniorGrant = 700.00;

        $trainingBudget = new TrainingBudget(new Senior());

        $this->assertSame($trainingBudgetSeniorGrant, $trainingBudget->calculateGrant());
    }
}
