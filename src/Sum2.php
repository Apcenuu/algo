<?php

namespace App;

final class Sum2
{
    public function twoSum(array $nums, int $target): array
    {
        /** array_flip */
        $map = [];
        for ($i = 0; $i < count($nums); $i++) {
            $map[$nums[$i]] = $i;
        }

        for ($i = 0; $i < count($nums); $i++) {
            $diff = $target - $nums[$i];

            if (isset($map[$diff]) && $map[$diff] !== $i) {
                return [$i, $map[$diff]];
            }
        }

        return [];
    }
}