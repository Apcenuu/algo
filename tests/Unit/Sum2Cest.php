<?php


namespace Tests\Unit;

use App\Sum2;
use Tests\Support\UnitTester;

class Sum2Cest
{
    public function tryToTest(UnitTester $I): void
    {
        $res = (new Sum2())->twoSum([2, 7, 11, 15], 9);
        $I->assertEquals([0,1], $res);
    }

    public function tryToTest2(UnitTester $I): void
    {
        $res = (new Sum2())->twoSum([2, 7, 11, 15], 14);
        $I->assertEquals([], $res);
    }
}
