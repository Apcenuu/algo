<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayAtCest
{
    public function arrayAtTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);

        $result = $array->at(-2);

        $I->assertEquals(9, $result);
    }
}
