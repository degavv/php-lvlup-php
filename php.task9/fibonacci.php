<?php
function getValues(): array
{
    $firstNum = $_GET['first'];
    $secondNum = $_GET['second'];
    $length = $_GET['length'];
    $data = [
        'firstNum' => (int) $firstNum,
        'secondNum' => (int) $secondNum,
        'length' => (int) $length,
    ];
    return $data;
}

function getFibonacciSeq($data): array
{
    $firstNum = $data['firstNum'];
    $secondNum = $data['secondNum'];
    $length = $data['length'];
    $result = [$firstNum, $secondNum];
    $len = $length - 2;
    for ($i = 0; $i < $len; $i++) {
        $result[] = $result[$i] + $result[$i + 1];
    }
    return $result;
}
$inputValues = getValues();
$res = getFibonacciSeq($inputValues);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Fibonacci</title>
</head>

<body>
    <p>First number = <?= $inputValues['firstNum'] ?></p>
    <p>Second number = <?= $inputValues['secondNum'] ?></p>
    <p>Sequence length = <?= $inputValues['length'] ?></p>
    <div>
        <p><strong>Fibonacci sequence : </strong></p>
        <?php foreach ($res as $element): ?>
            <span><?= $element . ";" ?></span>
        <?php endforeach; ?>
    </div>
</body>

</html>