<?php


namespace App\Tests\Unit;

use App\MyArray;
use Tests\Support\UnitTester;

class MoveZeroesCest
{
    public function moveZeroesTest(UnitTester $I): void
    {
        $array = new MyArray([3, 0, -1, 5, 7, 9, 12]);
        $array->moveZeroes();
        $I->assertEquals([3, -1, 5, 7, 9, 12, 0], $array->getArray());
    }
}
