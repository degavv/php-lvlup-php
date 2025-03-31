<?php
$input_year = $_POST["year"] ?? null;
$year = (int) $input_year;
$leap_years = "";
$i = 0;

while ($i < 3) {
    $year++;
    $is_leap = false;
    if ($year % 400 === 0) {
        $is_leap = true;
    } elseif ($year % 100 === 0) {
        $is_leap = false;
    } elseif ($year % 4 === 0) {
        $is_leap = true;
    }
    if ($is_leap) {
        $leap_years .= $year . "р.; ";
        $i++;
    }
}

?>
<!DOCTYPE html>
<html lang="uk">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Цикл While | Визначення високосних років</title>
    <link rel="stylesheet" href="/leap-year/css/style.css">
</head>
<body>
    <h1>Визначення високосних років</h1>
    <form action="/leap-year/index.php" method="post">
        <label for="year">Рік</label>
        <input type="number" name="year" id="year" placeholder="Введіть Рік">
        <button type="submit">Розрахувати</button>
    </form>
    <div class="result">
        <p>Три наступних високосних роки після <?=$input_year?>:</p>
        <p><?=$leap_years ?></p>
    </div>
</body>
</html>