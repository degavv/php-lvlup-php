<?php

function calcSum($startNum, $endNum): int
{
    if ($startNum === $endNum) {
        return $startNum;
    }
    $result = $startNum + calcSum( $startNum + 1, $endNum);
    return $result;
}

var_dump(calcSum(5,6));