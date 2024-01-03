<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class QuickSortCest
{
    public function quickSortTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);

        $I->assertEquals([-1, 0, 3, 5, 7, 9, 12],  $array->qSort($array->getArray()));

    }
}
