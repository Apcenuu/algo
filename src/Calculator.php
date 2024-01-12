<?php

declare(strict_types=1);

namespace App;

final class Calculator
{
    public function summ(array $a1, array $a2): array
    {
        $maxCount = max(count($a1), count($a2));
        $a1 = $this->normalize($a1, $maxCount);
        $a2 = $this->normalize($a2, $maxCount);
        $flag = 0;
        $res = [];
        for ($i = $maxCount - 1; $i >= 0; $i--) {
            $summ = $a1[$i] + $a2[$i] + $flag;
            if ($summ >= 10) {
                $flag = 1;
                $summ = $summ % 10;
            } else {
                $flag = 0;
            }
            array_unshift($res, $summ);
        }
        if ($flag) {
            $res = array_merge([1], $res);
        }
        return $res;
    }

    public function subtraction(array $a1, array $a2): array
    {
        $maxCount = max(count($a1), count($a2));
        $a1 = $this->normalize($a1, $maxCount);
        $a2 = $this->normalize($a2, $maxCount);

        $flag = 0;
        $res = [];
        for ($i = $maxCount - 1; $i >= 0; $i--) {
            $diff = $a1[$i] - $a2[$i] - $flag;
            if ($diff < 0) {
                $flag = 1;
                $diff = 10 + $diff;
            } else {
                $flag = 0;
            }
            array_unshift($res, $diff);
        }

        return $res;
    }

    public function multiplication(array $a1, array $a2): array
    {
        $maxCount = max(count($a1), count($a2));
        $a1 = $this->normalize($a1, $maxCount);
        $a2 = $this->normalize($a2, $maxCount);

        $remainder = 0;
        $res = [];
        for ($i = $maxCount - 1; $i >= 0; $i--) {
            for ($j = $maxCount - 1; $j >= 0; $j--) {
                $product = ($a1[$j] * $a2[$i]) + $remainder;
                if ($product >= 10) {
                    $remainder = intdiv($product, 10);
                    $product = $product % 10;
                } else {
                    $remainder = 0;
                }
                $res[$i][$j] = $product;
            }
        }

        $result = [];
        for ($i = count($res) - 1; $i >= 0; $i--) {
            $result[$i] = [];
            for ($j = count($res[$i]) - 1; $j >= 0; $j--) {
                array_unshift($result[$i], $res[$i][$j]);
            }
        }

        $multiplier = [];
        $total = $result[count($result) - 1];
        for ($i = count($result) - 1; $i > 0; $i--) {
            $multiplier[] = 0;
            $item1 = $total;
            $item2 = array_merge($result[$i - 1], $multiplier);
            $total = $this->summ($item1, $item2);
        }

        return $total;
    }

    private function normalize(array $a, int $maxCount): array
    {
        $zerosCount = $maxCount - count($a);
        $result = [];
        for ($i = 0; $i < $zerosCount; $i++) {
            $result[] = 0;
        }

        return array_merge($result, $a);
    }
}