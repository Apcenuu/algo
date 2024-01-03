<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayPushCest
{
    public function arrayPushTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $array->push(4);
        $I->assertEquals([3, 0, -1, 5, 7, 9, 12, 4], $array->getArray());
    }
}
