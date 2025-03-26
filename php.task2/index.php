<?php
$date = (int) $_GET['date'];
$month = (int) $_GET['month'];
$year = (int) $_GET['year'];
$a = (int) ((14 - $month) / 12);
$_year = $year - $a;
$_month = $month + 12 * $a - 2;
$day_week = ($date + (int) ((31 * $_month) / 12) + $_year + (int) ($_year / 4) - (int) ($_year / 100) + (int) ($_year / 400)) % 7;
$days_list = ["Sunday", "Monday", "Tuesday", "Wednesday", "Thursday", "Friday", "Saturday"];
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Day of the week</title>
</head>

<body>
    <form action="/index.php">
        <label for="date">Date</label>
        <input type="number" max="31" min="1" step="any" name="date" id="date">
        <label for="month">Month</label>
        <input type="number" max="12" min="1" step="any" name="month" id="month">
        <label for="year">Year</label>
        <input type="number" min="1582" step="any" name="year" id="year">
        <input type="submit">
    </form>
    <div><?php echo "Date {$date} Month {$month} Year {$year}"; ?></div>
    <div><?php echo "Day of the week is <b>$days_list[$day_week]</b>"; ?></div>
</body>

</html>