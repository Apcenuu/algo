<?php

namespace App;

/**
 * Учитывая целочисленный массив nums длины n и целочисленную цель, найдите три целых числа в nums, сумма которых наиболее близка к цели.
 * Возвращает сумму трех целых чисел.
 * Вы можете предположить, что каждый вход будет иметь ровно одно решение.
 */
final class Sum3Closest
{

    /**
     * @param int[] $nums
     *
     * Общая временная сложность этого решения - O(n^2 * log n), где n - длина массива $nums.
     * Это связано с сортировкой массива (O(n * log n)) и двумя вложенными циклами, каждый из которых выполняет двоичный поиск (O(log n)).
     */
    public function threeSumClosest(array $nums, int $target): int
    {
        /**
         * Сначала мы сортируем массив $nums в порядке возрастания.
         */
        $nums = (new MyArray($nums))->qSort($nums);
        $res = INF;
        /**
         * Затем мы используем две указателя - $i и $k, которые указывают на начало и конец массива соответственно.
         */
        $i = 0;
        $k = array_key_last($nums);

        while ($i + 1 < $k) {
            $needle = $target - $nums[$k] - $nums[$i];

            $binLeft = $i + 1;
            $binRight = $k - 1;
            $middle = INF;

            /**
             * Для каждой пары чисел $nums[$i] и $nums[$k] мы ищем третье число, которое делает сумму этих трех чисел максимально близкой к $target.
             * Для этого мы используем бинарный поиск в оставшейся части массива.
             * Применение бинарного поиска для поиска третьего числа, которое делает сумму наиболее близкой к $target.
             */

            while ($binLeft <= $binRight) {
                $j = (int)round(($binLeft + $binRight) / 2);
                if ($this->fIsCloserS($needle, $nums[$j], $middle)) {
                    $middle = $nums[$j];
                }
                if (($needle - $nums[$j]) < 0) {
                    $binRight = $j - 1;
                } else {
                    $binLeft = $j + 1;
                }
            }

            $sum = $nums[$k] + $nums[$i] + $middle;

            /**
             * Во время двоичного поиска мы отслеживаем наиболее близкое к $target значение суммы трех чисел и обновляем $res соответственно.
             * Обновление $res (наиболее близкой суммы) после каждой итерации.
             */
            if ($this->fIsCloserS($target, $sum, $res)) {
                if ($sum === $target) {
                    return $sum;
                }
                $res = $sum;
            }

            /**
             * Для случая, если несколько одинаковых чисел идут подряд
             *
             * После того как мы нашли наиболее близкую сумму, мы двигаем указатели $i и $k к центру, чтобы найти следующую пару чисел.
             * Перемещение указателей $i и $k к центру, чтобы найти следующую пару чисел.
             */
            if (
                $this->fIsCloserS($needle, $nums[$i + 1], $nums[$k - 1]) ||
                ($nums[$i + 1] === $nums[$k - 1] && $nums[$i + 1] === $nums[$i])
            ) {
                $k--;
                continue;
            }

            $i++;
        }
        return $res;
    }

    /**
     * @param int $target Цель
     * @param int $f Первая сумма
     * @param float $s Вторая сумма
     *
     * Определяет, ближе ли $f к $target, чем $s или нет
     */
    private function fIsCloserS(int $target, int $f, float $s): bool
    {
        $res = abs($target - $f) < abs($target - $s);
        return $res;
    }
}
