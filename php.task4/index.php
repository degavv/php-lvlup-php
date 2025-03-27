<?php

$_width = $_GET["width"] ?? null;
$_length = $_GET["length"] ?? null;

$length = (float) $_length;
const PLINTH_LEN = 2;
$width_valid_msg = null;
$length_valid_msg = null;


// Валідація вхідних даних
// Перевірка довжини
if ($_width === null) {
    $width_valid_msg = "Значення не введено";
} elseif ($_width === "") {
    $width_valid_msg = "Значення не може бути порожнє";
} else {
    $width = (float) $_width;
    if ($width === 0.0 && $_width !== '0') {
        $width_valid_msg = "Значення не має складатися з літер";
    } elseif ($width < 0) {
        $width_valid_msg = "Значення не може бути від'ємне";
    } elseif ($width === 0.0) {
        $width_valid_msg = "Значення не може бути нульовим";
    } elseif ($width > 100) {
        $width_valid_msg = "Значення не може бути більше 100";
    }
}
// Перевірка ширини
if ($_length === null) {
    $length_valid_msg = "Значення не введено";
} elseif ($_length === "") {
    $length_valid_msg = "Значення не може бути порожнє";
} else {
    $length = (float) $_length;
    if ($length === 0.0 && $_length !== '0') {
        $length_valid_msg = "Значення не має складатися з літер";
    } elseif ($length < 0) {
        $length_valid_msg = "Значення не може бути від'ємне";
    } elseif ($length === 0.0) {
        $length_valid_msg = "Значення не може бути нульовим";
    } elseif ($length > 100) {
        $length_valid_msg = "Значення не може бути більше 100";
    }
}

if (!($length_valid_msg && $width_valid_msg)) {
    $area = $width * $length;
    if ($area < 2) {
        $plinth_quantity = 1;
    } else {
        $plinth_quantity = $area / PLINTH_LEN;
    }
}




$foo = ($width * $length) % PLINTH_LEN;
$bar = (int) $plinth_quantity;
// var_dump( $width, $length );
// var_dump($plinth_quantity, $foo, $bar);

?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Світ плінтусів</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Розрахунок кількості необхідних плінтусів</h1>
    <form action="/index.php">
        <label for="length">Довжина кімнати</label>
        <input type="number" name="length" value="<?= $_length ?>" id="length" step="0.1"
            placeholder="Введіть довжину кімнати">
        <div>
            <?php if ($length_valid_msg): ?>
                <p><?= $length_valid_msg ?></p>
            <?php endif ?>
        </div>
        <label for="width">Ширина кімнати</label>
        <input type="number" name="width" value="<?= $_width ?>" id="width" step="0.1"
            placeholder="Введіть ширину кімнати">
        <div>
            <?php if ($width_valid_msg): ?>
                <p><?= $width_valid_msg ?></p>
            <?php endif ?>
        </div>
        <button type="submit">Розрахувати</button>
    </form>
    <?php if ($length_valid_msg && $width_valid_msg): ?>
        <div>Загальна площа кімнати складає = <?= $area ?> м<sup>2</sup></div><br> <!--TODO delete br -->
        <div>Необхідна кількості плінтусів = <?= $plinth_quantity ?></div>
    <?php endif ?>

</body>

</html>