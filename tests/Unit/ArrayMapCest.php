<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayMapCest
{
    public function arrayMapTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);

        $result = $array->map(function ($value, $index) {
            return $value + 2;
        });

        $I->assertEquals([5, 2, 1, 7, 9, 11, 14], $result);
    }
}
