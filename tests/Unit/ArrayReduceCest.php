<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayReduceCest
{
    public function arrayReduceTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 8, 7, 9, 12]);

        $summ = $array->reduce(function ($carry, $element) {
            $carry += $element;
            return $carry;
        });
        $I->assertEquals(38, $summ);
    }
}
