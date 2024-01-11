<?php


namespace App\Tests\Unit;

use App\Calculator;
use Codeception\Attribute\DataProvider;
use Codeception\Example;
use Tests\Support\UnitTester;

class CalculatorCest
{

    public function summTest(UnitTester $I): void
    {
        $calculator = new Calculator();
        $summ = $calculator->summ([1, 5, 0, 0, 0], [2, 0, 3, 0]);
        $I->assertEquals([1, 7, 0, 3, 0], $summ);
    }

    public function subtractionTest(UnitTester $I): void
    {
        $calculator = new Calculator();
        $diff = $calculator->subtraction([1, 5, 0, 0, 0], [2, 0, 3, 0]);
        $I->assertEquals([1, 2, 9, 7, 0], $diff);
    }

    /**
     * @uses multiplicationProvider
     */
    #[DataProvider('multiplicationProvider')]
    public function multiplicationTest(UnitTester $I, Example $example): void
    {
        $calculator = new Calculator();
        $product = $calculator->multiplication($example['a1'], $example['a2']);
        $count = count($example['res']);
        $I->assertEquals($example['res'], array_slice($product, -$count, $count));
    }

    protected function multiplicationProvider(): array
    {
        return [
            [
                'a1' => [2, 5], 'a2' => [3, 0], 'res' => [7, 5, 0],
            ],
            [
                'a1' => [2, 0], 'a2' => [2, 0], 'res' => [4, 0, 0],
            ],
            [
                'a1' => [1, 0, 0], 'a2' => [2, 0], 'res' => [2, 0, 0, 0],
            ],
            [
                'a1' => [1, 2, 3], 'a2' => [4, 5, 6, 7], 'res' => [5, 6, 1, 7, 4, 1],
            ],
        ];
    }
}
