<?php
function calcPow($num,$pow):float
{
    if ($pow === 0){
        return 1;
    }
    $result = $num * calcPow($num, $pow - 1);
    return $result;
}


var_dump(calcPow(3, 3));
