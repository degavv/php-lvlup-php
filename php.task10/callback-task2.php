<?php
/**
 * Return filtered array
 * @param array $array
 * @param callable $condition
 * @return array
 */
function filterArray (array $array, callable $condition) : array
{
    $filtered = [];
    foreach ($array as $key => $value) {
        if ($condition($value)){
            $filtered[$key] = $value;
        }
    }
    return $filtered;
}

$arr = [3,4,5,6,'a',7];

$numericArr = filterArray($arr, fn($value):bool => is_numeric($value));

var_dump(value: $numericArr);