<?php
$input_start = $_POST["start_num"];
$input_end = $_POST["end_num"];
$start_num = (int) $input_start;
$end_num = (int) $input_end;
$simple_numbers = [];

for ($i = $start_num; $i <= $end_num; $i++) {
    $dividers = 0;
    for ($j = 1; $j <= $i; $j++) {
        if ($i % $j === 0) {
            $dividers++;
            if ($dividers > 2) {
                break;
            }
        }
    }
    if ($dividers === 2) {
        $simple_numbers[] = $i;
    }
}
//Вивід
echo ("Початкове значення " . $start_num . "\n");
echo ("Кінцеве значення " . $end_num . "\n");
echo ("Прості числа в цьому проміжку: ");
$array_len = count($simple_numbers);
for ($i = 0; $i < $array_len; $i++) {
    if ($i == $array_len - 1){
        echo $simple_numbers[$i];
    } else {
        echo ("$simple_numbers[$i], ");
    }
}
// var_dump($simple_numbers);