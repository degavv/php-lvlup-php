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
$validation_errors = [];
$is_valid = false;
$sum = 0;
$interval = "";

if ($input_start == null) {
    $validation_errors["start"] = $errors_list["null"];
    echo "NULL";
} elseif ($input_start === "") {
    $validation_errors["start"] = $errors_list["empty"];
} else {
    $num_start = (int) $input_start;
    if ($num_start === 0 && $input_start !== "0") {
        $validation_errors["start"] = $errors_list["chars"];
    } elseif (($num_start - $input_start) !== 0) {
        $validation_errors["start"] = $errors_list["float"];
    }
}

if ($input_end == null) {
    $validation_errors["end"] = $errors_list["null"];
    echo "NULL";
} elseif ($input_end === "") {
    $validation_errors["end"] = $errors_list["empty"];
} else {
    $num_end = (int) $input_end;
    if ($num_end === 0 && $input_end !== "0") {
        $validation_errors["end"] = $errors_list["chars"];
    } elseif (($num_end - $input_end) !== 0) {
        $validation_errors["end"] = $errors_list["float"];
    } elseif ($num_end <= $num_start) {
        $validation_errors["end"] = $errors_list["less"];
    }
}

if (count($validation_errors) == 0) {
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
            <input type="number" name="start" id="start" placeholder="Введіть початкове значення" value="<?= $validation_errors["end"] ?? '' ? $input_start : '' ?>">
            <div>
                <?php if ($validation_errors["start"] ?? null): ?>
                    <p><?= $validation_errors["start"] ?></p>
                <?php endif ?>
            </div>
            <label for="end">Кінцеве значення</label>
            <input type="number" name="end" id="end" placeholder="Введіть кінцеве значення" value="<?= $validation_errors["start"] ?? '' ? $input_end : '' ?>">
            <div>
                <?php if ($validation_errors["end"] ?? null): ?>
                    <p><?= $validation_errors["end"] ?></p>
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