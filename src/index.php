<?php

use App\MyArray;

include __DIR__.'/../vendor/autoload.php';

$array = new MyArray([3, 0, -1, 5, 7, 9, 12]);

$result = $array->qSort($array->getArray());
dump($result);
$array->push(4);
dump($array->getArray());
$array->pop();
dump($array->getArray());
$array->reverse();
dump($array->getArray());
dump($array->filter(function ($element) {
    return $element < 0;
}));
//dump($array->map(function ($value, $index) {
//    return $value + 2;
//}));
//dump($array->reduce(function ($carry, $element) {
//    $carry += $element;
//    return $carry;
//}));
dump($array->at(-2));
dump($array->merge([3,5,7,10,15]));