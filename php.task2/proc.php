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
var_dump( $day_week );
// echo "Day of the week is $days_list[$day_week]";
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day of the week</title>
</head>
<body>
    <form action="/proc.php">
        <label for="date">Число</label>
        <input type="number" max="31" min="1" step="any" name="date" id="date">
        <label for="month">Місяць</label>
        <input type="number" max="12" min="1" step="any" name="month" id="month">
        <label for="year">Рік</label>
        <input type="number" min="1582" step="any" name="year" id="year">
        <input type="submit">
    </form>
    <div><?php echo "Day of the week is $days_list[$day_week]";?></div>
</body>
</html>