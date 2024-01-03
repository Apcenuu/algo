<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayMergeCest
{
    public function arrayMergeTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);

        $result = $array->merge([3, 5, 7, 10, 15]);

        $I->assertEquals([-1, 0, 3, 3, 5, 5, 7, 7, 9, 10, 12, 15], $result);
    }
}
