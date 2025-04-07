<?php
function validateInputValues(): array
{
    $errors = [];
    $num = $_POST["number"] ?? null;
    $pow = $_POST["power"] ?? null;

    if ($num === null || $num === '') {
        $errors[] = "Число не введено";
    } elseif (!is_numeric($num)) {
        $errors[] = "Число має бути числовим значенням";
    } else {
        $number = (float) $num;
    }

    if ($pow === null || $pow === '') {
        $errors[] = "Степінь не введено";
    } elseif (!is_numeric($pow)) {
        $errors[] = "Степінь має бути числовим значенням";
    } else{
        $power = (int) $pow;
        if (($power - $pow) !== 0)
        $errors[] = "Степінь має бути цілим числом";
    }

    if (empty($errors)) {
        return [
            'valid' => true,
            'number' => $number,
            'power' => $power,
        ];
    }

    return [
        'valid' => false,
        'errors' => $errors,
    ];
}

function exponent($number, $power): int|float
{
    $isNegativePow = false;
    if ($power == 0) {
        return 1;
    } elseif ($power < 0) {
        $power *= -1;
        $isNegativePow = true;
    }

    $result = $number;
    for ($i = 1; $i < $power; $i++) {
        $result *= $number;
    }

    if ($isNegativePow) {
        return 1 / $result;
    }
    return $result;
}

function main()
{
    $inputValues = validateInputValues();

    if ($inputValues['valid']) {
        $number = $inputValues['number'];
        $power = $inputValues['power'];
        $res = exponent($number, $power);
        return $res;
    } else {
        $errorMsg = '';
        foreach ($inputValues["errors"] as $error) {
            $errorMsg .= "<br>" . $error . "<br>";
        }
        return $errorMsg;
    }
}

$res = main();

?>
<!DOCTYPE html>
<html lang="uk">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Степінь числа</title>
    <link rel="stylesheet" href="/css/style.css">
</head>

<body>
    <h1>Піднесення числа до степеня</h1>
    <form action="/index.php" method="post">
        <label for="number">Число</label>
        <input type="text" id="number" name="number" placeholder="Введіть число">
        <label for="power">Степінь</label>
        <input type="text" id="power" name="power" placeholder="Введіть степінь">
        <button type="submit">Розрахувати результат</button>
    </form>
    <div>
        <span class="result">Результат: </span>
        <span class="error"><?= $res ?></span>
    </div>
</body>

</html>