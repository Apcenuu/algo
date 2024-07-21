<?php

namespace App;

final class BinarySearch
{
    function search(array $nums, int $target): int
    {
        $highIdx = count($nums) - 1;
        $lowIdx = 0;
        while ($lowIdx <= $highIdx) {
            $midIdx = (int)(($highIdx + $lowIdx) / 2);
            if ($target === $nums[$midIdx]) {
                return $midIdx;
            }
            if ($nums[$midIdx] < $target) {
                $lowIdx = $midIdx + 1;
            } else {
                $highIdx = $midIdx - 1;
            }
        }
        return -1;
    }
}