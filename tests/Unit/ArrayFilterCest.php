<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayFilterCest
{
    public function positiveArrayFilerTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $result = $array->filter(function ($element) {
            return $element > 0;
        });
        $I->assertEquals([3, 5, 7, 9, 12], $result);
    }

    public function negativeArrayFilterTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $result = $array->filter(function ($element) {
            return $element < 0;
        });
        $I->assertEquals([-1], $result);
    }

    public function nonPositiveArrayFilterTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $result = $array->filter(function ($element) {
            return $element <= 0;
        });
        $I->assertEquals([0, -1], $result);
    }

    public function nonNegativeArrayFilterTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $result = $array->filter(function ($element) {
            return $element >= 0;
        });
        $I->assertEquals([3, 0, 5, 7, 9, 12], $result);
    }
}
