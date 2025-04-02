<?php
$input_num = $_POST["number"] ?? null;
$number = (int) $input_num;
$factorial = 1;

if ($number < 0) {
    echo "Значення не може бути від'ємним ";
    $factorial = null;
} else {
    for ($i = 1; $i <= $number; $i++) {
        $factorial *= $i;
    }
}
var_dump($factorial);