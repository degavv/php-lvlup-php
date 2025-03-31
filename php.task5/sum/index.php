<?php
$input_start = $_POST["start"] ?? null;
$input_end = $_POST["end"] ?? null;
$errors_list = [
    "null" => "Значення не введено",
    "empty" => "Значення не може бути пусте",
    "chars" => "Значення не має містити зайвих символів",
    "float" => "Число не може бути дробовим",
    "less" => "Число має бути більшим за початкове",
];

$error_msg = [];
$is_valid = false;
$sum = 0;
$interval = "";


var_dump($input_start === null);
if ($input_start === null) {
    $error_msg["start"] = $errors_list["null"];
} elseif ($input_start === "") {
    $error_msg["start"] = $errors_list["empty"];
} else {
    $num_start = (int) $input_start;
    if ($num_start === 0 && $input_start !== "0") {
        $error_msg["start"] = $errors_list["chars"];
    } elseif (($num_start - $input_start) !== 0) {
        $error_msg["start"] = $errors_list["float"];
    }
}

if ($input_end == null) {
    $error_msg["end"] = $errors_list["null"];
} elseif ($input_end === "") {
    $error_msg["end"] = $errors_list["empty"];
} else {
    $num_end = (int) $input_end;
    if ($num_end === 0 && $input_end !== "0") {
        $error_msg["end"] = $errors_list["chars"];
    } elseif (($num_end - $input_end) !== 0) {
        $error_msg["end"] = $errors_list["float"];
    } elseif ($num_end <= $num_start) {
        $error_msg["end"] = $errors_list["less"];
    }
}

if (count($error_msg) == 0) {
    $is_valid = true;
}

if ($is_valid) {
    $start = $num_start;
    while ($start <= $num_end) {
        $sum += $start;
        if ($start !== $num_end) {
            $interval .= $start . ", ";
        } else {
            $interval .= $start;
        }
        $start++;
    }
}

?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Сума чисел</title>
    <link rel="stylesheet" href="/sum/css/style.css">
</head>

<body>
    <main>
        <h1>Підрахунок суми чисел</h1>
        <form action="/sum/index.php" method="post">
            <label for="start">Початкове значення</label>
            <input type="number" name="start" id="start" placeholder="Введіть початкове значення" value="<?= $error_msg["end"] ?? '' ? $input_start : '' ?>">
            <div>
                <?php if ($error_msg["start"] ?? null): ?>
                    <p><?= $error_msg["start"] ?></p>
                <?php endif ?>
            </div>
            <label for="end">Кінцеве значення</label>
            <input type="number" name="end" id="end" placeholder="Введіть кінцеве значення" value="<?= $error_msg["start"] ?? '' ? $input_end : '' ?>">
            <div>
                <?php if ($error_msg["end"] ?? null): ?>
                    <p><?= $error_msg["end"] ?></p>
                <?php endif ?>
            </div>
            <button type="submit">Розрахувати</button>
        </form>
        <?php if($is_valid):?>
            <div class="numbers"><?= $interval ?></div>
            <div class="sum">Сума всіх чисел = <?= $sum ?></div>
        <?php endif ?>
    </main>
</body>

</html>