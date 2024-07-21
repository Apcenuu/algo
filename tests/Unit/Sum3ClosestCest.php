<?php


namespace Tests\Unit;

use App\Sum3Closest;
use Tests\Support\UnitTester;

class Sum3ClosestCest
{
    public function tryToTest(UnitTester $I): void
    {
        $solution = new Sum3Closest();
        $result = $solution->threeSumClosest([-1,2,1,-4], 1);
        $I->assertEquals(2, $result);
    }

    public function tryToTest2(UnitTester $I): void
    {
        $solution = new Sum3Closest();
        $result = $solution->threeSumClosest([0,0,0], 1);
        $I->assertEquals(0, $result);
    }

    public function tryToTest3(UnitTester $I): void
    {
        $solution = new Sum3Closest();
        $result = $solution->threeSumClosest([1,1,1,0], -100);
        $I->assertEquals(2, $result);
    }

    public function tryToTest4(UnitTester $I): void
    {
        $solution = new Sum3Closest();
        $result = $solution->threeSumClosest([0,1,2], 3);
        $I->assertEquals(3, $result);
    }

    public function tryToTest5(UnitTester $I): void
    {
        $solution = new Sum3Closest();
        $result = $solution->threeSumClosest([0,1,2], 0);
        $I->assertEquals(3, $result);
    }

    public function tryToTest6(UnitTester $I): void
    {
        $solution = new Sum3Closest();
        $result = $solution->threeSumClosest([4,0,5,-5,3,3,0,-4,-5], -2);
        $I->assertEquals(-2, $result);
    }
}
