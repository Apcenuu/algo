<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class ArrayPopCest
{

    public function arrayPopTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $array->pop();
        $I->assertEquals([3, 0, -1, 5, 7, 9], $array->getArray());
    }
}
