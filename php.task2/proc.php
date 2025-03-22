<?php
$date = (int) $_GET['date'];
$month = (int) $_GET['month'];
$year = (int) $_GET['year'];
echo "Date {$date} Month {$month} Year {$year}<br>";
$a = (int) (14 - $month) / 12;
$year = $year - $a;
$month = $month + 12 * $a - 2;
$day_week = ($date + (int) ((31 * $month) / 12) + $year + (int) ($year / 4) - (int) ($year / 100) + (int) ($year / 400)) % 7;
$days_list = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
echo "Day of the week is $days_list[$day_week]";
