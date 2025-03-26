<?php
$price = (int) $_GET["price"];
$error_msg = null;
$discount = 0;
$total_discount = 0;
$total_price = 0;
$currency = "грн.";

if ($price < 0) {
    $error_msg = "Ціна не може бути від'ємною";
}

if ($price === 0 && $_GET["price"] !== "0") {
    $error_msg = "Введіть числове значення";
}

if ($error_msg === null) {
    if ($price < 100) {
        $discount = 0;
    } else {
        if ($price < 500) {
            $discount = 5;
        } else {
            if ($price < 1000) {
                $discount = 10;
            } else {
                if ($price >= 1000) {
                    $discount = 15;
                }
            }
        }
    }
    $total_discount = ($price * $discount) / 100;
    $total_price = $price - $total_discount;
} else {
    $price = 0;
}

?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>discount</title>
    <link rel="stylesheet" href="/discount/css/style.css">
</head>

<body>
    <div>
        <p>Ціна товару = <?= $price . $currency ?></p>
        <p>Знижка = <?= $discount ?>% (<?= $total_discount . $currency ?>)</p>
        <p>Ціна зі знижкою = <?= $total_price . $currency ?></p>
    </div>
    <?php if ($error_msg): ?>
        <div class="error">
            <p><?= $error_msg ?></p>
        </div>
    <?php endif ?>
</body>

</html>