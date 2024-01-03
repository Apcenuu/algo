<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class BubbleSortCest
{
    public function bubbleSortTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);

        $result = $array->bubbleSort($array->getArray());

        $I->assertEquals([-1, 0, 3, 5, 7, 9, 12], $result);
    }
}
