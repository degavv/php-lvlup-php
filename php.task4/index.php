<?php

$_width = $_GET["width"] ?? null;
$_length = $_GET["length"] ?? null;
$width = (float) $_width;
$length = (float) $_length;
const PLINTH_LEN = 2;
$width_valid_msg = null;
$length_valid_msg = null;

// Валідація вхідних даних

if ($width == null) {
    $width_valid_msg = "Значення не введено";
} elseif ($width == ""){
    $width_valid_msg = "Значення не може бути порожнє";
} elseif ($width < 0 ){
    $width_valid_msg = "Значення не може бути від'ємне";
} elseif ($width == 0 ){
    $width_valid_msg = "Значення не може бути нульовим";
}




$plinth_quantity = ($width * $length) / PLINTH_LEN;
$foo = ($width * $length) % PLINTH_LEN;
$bar = (int) $plinth_quantity;
// var_dump( $width, $length );
var_dump($plinth_quantity, $foo, $bar);

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
        <input type="number" name="length" value="<?=$_length ?>" id="length" step="0.1" placeholder="Введіть довжину кімнати">
        <?php if ($length_valid_msg):?>
            <p><?=$length_valid_msg ?></p>
        <?php endif ?>
        <label for="width">Ширина кімнати</label>
        <input type="number" name="width" value="<?=$_width ?>" id="width" step="0.1" placeholder="Введіть ширину кімнати">
        <?php if ($width_valid_msg):?>
            <p><?=$width_valid_msg ?></p>
        <?php endif ?>
        <button type="submit">Розрахувати</button>
    </form>
    <div><?= $plinth_quantity ?></div>
</body>

</html>