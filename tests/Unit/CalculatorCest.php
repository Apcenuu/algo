<?php


namespace App\Tests\Unit;

use App\Calculator;
use Tests\Support\UnitTester;

class CalculatorCest
{

    public function summTest(UnitTester $I): void
    {
        $calculator = new Calculator();
        $summ = $calculator->summ([1, 5, 0, 0, 0], [2, 0, 3, 0]);
        $I->assertEquals([1, 7, 0, 3, 0], $summ);
    }
}
