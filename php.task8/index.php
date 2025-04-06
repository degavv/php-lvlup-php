<?php
function validateInputValues(): bool|array
{
    $num = $_GET["number"];
    $deg = $_GET["degree"];
    return ["number" => $num, "degree" => $deg];
}

function exponent($numAndDegree){
    $num = $numAndDegree["number"];
    $deg = $numAndDegree["degree"];
    $result = $num;
    for ($i = 1; $i < $deg; $i++) {
        $result *= $num;
    }
    return $result;
}
$res = exponent(validateInputValues());
var_dump($res);
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
    <form action="/index.php">
        <label for="number">Число</label>
        <input type="text" id="number" name="number" placeholder="Введіть число">
        <label for="degree">Степінь</label>
        <input type="text" id="degree" name="degree" placeholder="Введіть степінь">
        <button type="submit">Розрахувати результат</button>
    </form>
</body>

</html>