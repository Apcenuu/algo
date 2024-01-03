<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayReverseCest
{
    public function arrayReverseTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $array->reverse();
        $I->assertEquals([12, 9, 7, 5, -1, 0, 3], $array->getArray());
    }
}
