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
            $res[] = $summ;
        }
        if ($flag) {
            $res = array_merge($res, [1]);
        }
        return array_reverse($res);
    }

    public function normalize(array $a, int $maxCount): array
    {
        $zerosCount = $maxCount - count($a);
        $result = [];
        for ($i = 0; $i < $zerosCount; $i++) {
            $result[] = 0;
        }

        return array_merge($result, $a);
    }
}