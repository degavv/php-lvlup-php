<?php

$_width = $_GET["width"] ?? null;
$_length = $_GET["length"] ?? null;
const PLINTH_LEN = 2;
$width_valid_msg = null;
$length_valid_msg = null;
$max_size = 500;
$max_factor = 0;
$is_valid = false;
$error_code = ["Значення не введено", "Значення не може бути порожнє", "Значення не має складатися з літер", "Значення не може бути від'ємне", "Значення не може бути нульовим", "Значення не може бути більше 100"];
// Валідація вхідних даних
// Перевірка довжини
if ($_width === null) {
    $width_valid_msg = $error_code[0];
} elseif ($_width === "") {
    $width_valid_msg = $error_code[1];

} else {
    $width = (float) $_width;
    if ($width === 0.0 && $_width !== '0') {
        $width_valid_msg = $error_code[2];
    } elseif ($width < 0) {
        $width_valid_msg = $error_code[3];
    } elseif ($width === 0.0) {
        $width_valid_msg = $error_code[4];
    } elseif ($width > 100) {
        $width_valid_msg = $error_code[5];
    }
}
// Перевірка ширини
if ($_length === null) {
    $length_valid_msg = $error_code[0];
} elseif ($_length === "") {
    $length_valid_msg = $error_code[1];
} else {
    $length = (float) $_length;
    if ($length === 0.0 && $_length !== '0') {
        $length_valid_msg = $error_code[2];
    } elseif ($length < 0) {
        $length_valid_msg = $error_code[3];
    } elseif ($length === 0.0) {
        $length_valid_msg = $error_code[4];
    } elseif ($length > 100) {
        $length_valid_msg = $error_code[5];
    }
}

if (!($length_valid_msg) && !($width_valid_msg)) {
    $is_valid = true;
}

// Розрахунок кількості
if ($is_valid) {
    $area = $width * $length;
    if ($area < 2) {
        $plinth_quantity = 1;
    } else {
        $plinth_quantity = $area / PLINTH_LEN;
        if ((int) $plinth_quantity != $plinth_quantity) {
            $plinth_quantity = (int) ++$plinth_quantity;
        }
    }
}


//Frontend на php ;)
// Визначення пропорції
if ($is_valid) {
    if ($width < $length) {
        $proportion_l = $length / $width;
        $max_factor = $proportion_l;
        $proportion_w = 1;
    } else {
        $proportion_w = $width / $length;
        $max_factor = $proportion_w;
        $proportion_l = 1;
    }
}

//Масштабую
if ($max_factor < 2) {
    $scale = $max_size / 2;
} elseif ($max_factor < 5) {
    $scale = $max_size / 5;
} elseif ($max_factor < 10) {
    $scale = $max_size / 10;
} elseif ($max_factor < 20) {
    $scale = $max_size / 20;
} elseif ($max_factor < 30) {
    $scale = $max_size / 30;
} elseif ($max_factor < 40) {
    $scale = $max_size / 40;
} elseif ($max_factor < 50) {
    $scale = $max_size / 50;
} elseif ($max_factor < 60) {
    $scale = $max_size / 60;
} elseif ($max_factor < 70) {
    $scale = $max_size / 70;
} elseif ($max_factor < 80) {
    $scale = $max_size / 80;
} elseif ($max_factor < 90) {
    $scale = $max_size / 90;
} else {
    $scale = $max_size / 100;
}

$proportion_l *= $scale;
$proportion_w *= $scale;
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
    <main>
        <div class="block-left">
            <form action="/index.php">
                <label for="length">Довжина кімнати</label>
                <input type="number" name="length" value="<?= $_length ?>" id="length" step="0.1"
                    placeholder="Введіть довжину кімнати" <?php if ($length_valid_msg)
                        echo 'class="invalid"' ?>>
                    <div>
                    <?php if ($length_valid_msg): ?>
                        <p><?= $length_valid_msg ?></p>
                    <?php endif ?>
                </div>
                <label for="width">Ширина кімнати</label>
                <input type="number" name="width" value="<?= $_width ?>" id="width" step="0.1"
                    placeholder="Введіть ширину кімнати" <?php if ($width_valid_msg)
                        echo 'class="invalid"' ?>>
                    <div>
                    <?php if ($width_valid_msg): ?>
                        <p><?= $width_valid_msg ?></p>
                    <?php endif ?>
                </div>
                <button type="submit">Розрахувати</button>
            </form>
        </div>
        <div class="block-right">
            <div class="wrapper">
                <?php if ($is_valid): ?>
                    <div class="computing-text">
                        <div>Загальна площа кімнати складає = <?= $area ?> м<sup>2</sup></div>
                        <div>Необхідна кількість плінтусів = <?= $plinth_quantity ?></div>
                    </div>
                    <div class="frame">
                        <div class="room" style="width: <?= $proportion_w ?>px; height: <?= $proportion_l ?>px;"></div>
                    </div>
                <?php endif ?>
            </div>

        </div>
    </main>

</body>

</html>