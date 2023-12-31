<?php

declare(strict_types=1);

namespace App;

final class MyArray
{
    private array $a;

    public function __construct(array $a)
    {
        $this->a = $a;
    }

    public function getArray(): array
    {
        return $this->a;
    }

    public function qSort(array $a): array
    {
        if (count($a) < 2) {
            return $a;
        }
        $less = [];
        $greater = [];
        $pivot = $a[0];

        for ($i = 1; $i < count($a); $i++) {
            if ($a[$i] <= $pivot) {
                $less[] = $a[$i];
            }
            if ($a[$i] > $pivot) {
                $greater[] = $a[$i];
            }
        }
        $result = array_merge($this->qSort($less), [$pivot], $this->qSort($greater));
        return $result;
    }

    public function selectionSort(array $a): array
    {
        $count = count($a);
        for ($i = 0; $i < $count; $i++) {
            $min = $a[$i];
            $minIndex = $i;
            for ($j = $i+1; $j < $count; $j++) {
                if ($min > $a[$j]) {
                    $min = $a[$j];
                    $minIndex = $j;
                }
            }
            if ($minIndex != $i) {
                $temp = $a[$i];
                $a[$i] = $a[$minIndex];
                $a[$minIndex] = $temp;
            }
        }
        return $a;
    }

    public function bubbleSort(array $a): array
    {
        $count = count($a);
        for ($i = 0; $i < $count; $i++) {
            for ($j = $i + 1; $j < $count - 1; $j++) {
                if ($a[$i] > $a[$j]) {
                    $temp = $a[$j];
                    $a[$j] = $a[$i];
                    $a[$i] = $temp;
                }
            }
        }
        return $a;
    }

    public function push(int $element): void
    {
        $this->a[] = $element;
    }

    public function pop(): void
    {
        $keys = array_keys($this->a);
        $last = end($keys);
        unset($this->a[$last]);
    }

    public function reverse(): void
    {
        $a = [];
        $j = 0;
        for ($i = count($this->a) - 1; $i >= 0; $i--) {
            $a[$j] = $this->a[$i];
            $j++;
        }
        $this->a = $a;
    }

    public function filter(callable $callback): array
    {
        $a = [];
        for ($i = 0; $i < count($this->a); $i++) {
            if ($callback($this->a[$i])) {
                $a[] = $this->a[$i];
            }
        }
        return $a;
    }

    public function map(callable $callback): array
    {
        $a = [];
        for ($i = 0; $i < count($this->a); $i++) {
            $a[$i] = $callback($this->a[$i], $i, $this->a);
        }
        return $a;
    }

    public function reduce(callable $callback): int
    {
        $carry = 0;
        for ($i = 0; $i < count($this->a); $i++) {
            $carry = $callback($carry, $this->a[$i]);
        }
        return $carry;
    }

    public function at(int $index): int
    {
        if ($index >= 0) {
            return $this->a[$index];
        }
        return $this->a[count($this->a) + $index];
    }

    public function merge(array $a2): array
    {
        $a1 = $this->qSort($this->a);
        $i = 0;
        $j = 0;
        $k = 0;
        $res = [];
        while ($i < count($a1) && $j < count($a2)) {
            if ($a1[$i] < $a2[$j]) {
                $res[$k] = $a1[$i];
                $i++;
            } else {
                $res[$k] = $a2[$j];
                $j++;
            }
            $k++;
        }
        while (isset($a1[$i])) {
            $res[$k] = $a1[$i];
            $i++;
            $k++;
        }
        while (isset($a2[$j])) {
            $res[$k] = $a2[$j];
            $j++;
            $k++;
        }
        return $res;
    }

    public function moveZeroes(): void
    {
        $count = count($this->a);
        $i = 0;
        while ($i < $count && $this->a[$i] != 0) {
            $i++;
        }
        $j = $i;
        for (; $i < $count; $i++) {
            if ($this->a[$i] != 0) {
                $this->a[$j] = $this->a[$i];
                $j++;
            }
        }
        for (; $j < $count; $j++) {
            $this->a[$j] = 0;
        }
    }

    public function __toString(): string
    {
        $result = '';
        for ($i = 0; $i < count($this->a); $i++) {
            $result .= $this->a[$i] . ',';
        }
        return substr($result, 0, -1);
    }
}