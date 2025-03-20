<?php
$meat = 3100;
$portion = 100;
$guests = 4;
$total_portions = $meat / $portion;
$is_enough = $total_portions >= $guests;
$is_enough = (int)$is_enough;
echo "Загальна кількість м'яса = {$meat} грам<br>";
echo "Одна порція становить {$portion} грам<br>";
echo "Кількість гостей {$guests}<br>";
echo "М'яса вистачає (1 - Так | 0 - Ні). Результат = $is_enough";
?>