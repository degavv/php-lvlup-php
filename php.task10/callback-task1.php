<?php
$arr = [3,4,6,7,8,2];

function changeArr(array &$arr, callable $callback): void 
{
    foreach ($arr as &$value){
        $value = $callback($value);
    }
}

var_dump($arr);

function mult10 (float $number): float
{
    return $number*10;
}

changeArr($arr, 'mult10');
var_dump($arr);