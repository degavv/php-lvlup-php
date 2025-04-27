<?php
function swapValues(&$val1, &$val2): void
{
    $tmp = $val1;
    $val1 = $val2;
    $val2 = $tmp;
}

//bubble sort
function sortArray(array &$arr): void
{
    $list = [];
    foreach ($arr as $val) {
        $list[] = $val;
    }
    $arr = $list;

    //Start sort
    $lenth = count($arr);
    for ($j = 0; $j < $lenth - 1; $j++) {
        $isSwaped = false;
        for ($i = 0; $i < $lenth - 1 - $j; $i++) {
            var_dump(value: $arr[$i]);
            if ($arr[$i] > $arr[$i + 1]) {
                swapValues($arr[$i], $arr[$i + 1]);
                $isSwaped = true;
            }
        }
        if (!$isSwaped) {
            break;
        }
    }
}

$array = [2, 5, 1, 6, 3, 4];
sortArray($array);
var_dump($array);
