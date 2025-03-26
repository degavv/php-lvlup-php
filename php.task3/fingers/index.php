<?php
$finger_num = (int) $_GET["num"];
$finger_name = "";
$error_msg = null;

if ($finger_num === 1) {
    $finger_name = "Великий";
} elseif ($finger_num === 2) {
    $finger_name = "Вказівний";
} elseif ($finger_num === 3) {
    $finger_name = "Середній";
} elseif ($finger_num === 4) {
    $finger_name = "Безіменний";
} elseif ($finger_num === 5) {
    $finger_name = "Мізинець";
} else {
    $error_msg = "Введіть коректне значення (Від 1 до 5)";
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>finger name</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <?php if ($error_msg): ?>
        <div class="error">
            <p><?= $error_msg ?></p>
        </div>
    <?php else: ?>
        <div>
            <p>Номер <?= $finger_num ?> відповідає назві пальця <?= $finger_name ?></p>
        </div>
    <?php endif ?>
    
</body>

</html>