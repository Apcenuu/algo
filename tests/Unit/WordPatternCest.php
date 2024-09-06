<?php

namespace App\Tests\Unit;

use App\WordPattern;
use Tests\Support\UnitTester;

class WordPatternCest
{
    public function tryToTest(UnitTester $I): void
    {
        $pattern = new WordPattern();
        $I->assertTrue($pattern->wordPattern('abba', 'dog cat cat dog'));
    }

    public function tryToTest2(UnitTester $I): void
    {
        $pattern = new WordPattern();
        $I->assertFalse($pattern->wordPattern('abba', 'dog cat cat fish'));
    }

    public function tryToTest3(UnitTester $I): void
    {
        $pattern = new WordPattern();
        $I->assertFalse($pattern->wordPattern('abba', 'dog dog dog dog'));
    }

    public function tryToTest4(UnitTester $I): void
    {
        $pattern = new WordPattern();
        $I->assertFalse($pattern->wordPattern('abc', 'dog cat dog'));
    }

    public function tryToTest5(UnitTester $I): void
    {
        $pattern = new WordPattern();
        $I->assertTrue($pattern->wordPattern('deadbeef', 'd e a d b e e f'));
    }

    public function tryToTest6(UnitTester $I): void
    {
        $pattern = new WordPattern();
        $I->assertTrue($pattern->wordPattern('ccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccccdd', 's s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s s t t'));
    }
}