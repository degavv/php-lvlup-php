<?php
$year = 600;
$is_leap = !($year%400) || (!($year%4) && ($year%100)) || (!($year%400) && !($year%4));
$is_leap = (int) $is_leap;
echo "Рік $year високосний (0 - Ні | 1 - Так). Результат = $is_leap";