<?php
$date = (int) $_GET['date'];
$month = (int) $_GET['month'];
$year = (int) $_GET['year'];
$is_leap = false;
$is_correct = false;
$msg = "";
$days = [
    1 => 31,
    2 => 28,
    3 => 31,
    4 => 30,
    5 => 31,
    6 => 30,
    7 => 31,
    8 => 31,
    9 => 30,
    10 => 31,
    11 => 30,
    12 => 31,
];

if ($year % 400 === 0) {
    $is_leap = true;
} elseif ($year % 100 === 0) {
    $is_leap = false;
} elseif ($year % 4 === 0) {
    $is_leap = true;
}

if (($month > 0 && $month <= 12) && ($date > 0 && $date <= 31)) {
    $is_correct = true;
}

if ($is_correct) {
    if ((!$is_leap) || ($is_leap && $month !== 2)) {
        if ($date <= $days[$month]) {
            $is_correct = true;
        } else {
            $is_correct = false;
        }
    } else {
        if ($month === 2 && $date <= 29) {
            $is_correct = true;
        }
    }
}

if ($is_correct) {
    $msg = 'Дата введена вірно';
} else {
    $msg = "Дата введена не коректно";
}

if (($_GET['date'] === null) || ($_GET['month'] === null) || ($_GET['year'] === null)){
    $msg = '';
}
?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Коректність дати</title>
</head>

<body>
    <form action="/correct-date/index.php">
        <label for="date">Дата</label>
        <input type="number" max="31" min="1" step="any" name="date" id="date">
        <label for="month">Місяць</label>
        <input type="number" max="12" min="1" step="any" name="month" id="month">
        <label for="year">Рік</label>
        <input type="number" min="1582" step="any" name="year" id="year">
        <input type="submit">
    </form>
    <div><?php echo "Дата {$date} Місяць {$month} Рік {$year}"; ?></div>
    <div>
        <p><?= $msg ?></p>
    </div>
</body>

</html>