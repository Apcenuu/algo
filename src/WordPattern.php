<?php

namespace App;

class WordPattern
{
    public function wordPattern(string $pattern, string $s): bool
    {
        $letters = str_split($pattern);
        $countLetters = count($letters);
        $words = explode(' ', $s);
        $countWords = count($words);

        if ($countWords !== $countLetters) {
            return false;
        }

        $map = [];
        $map2 = [];
        for ($i = 0; $i < $countLetters; $i++) {
            if (!isset($map[$letters[$i]])) {
                if (array_key_exists($words[$i], $map2)) {
                    return false;
                }
                $map[$letters[$i]] = $words[$i];
                $map2[$words[$i]] = null;
                continue;
            }

            if ($map[$letters[$i]] !== $words[$i]) {
                return false;
            }
        }

        return true;
    }
}