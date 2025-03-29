<?php

$input_start = $_POST["start"] ?? null;
$input_end = $_POST["end"] ?? null;
$errors = [];
$is_valid = false;

if ($input_start === null) {
    $errors["null"] = "Значення не введено";
} elseif ($input_end === "") {
     $errors["empty"] = "Значення не може бути пусте";
} else {
    $num_start = (int) $input_start;
    if ($num_start === 0 && $input_start !== "0") {
        $errors["chars"] = "Значення не має містити зайвих символів";
    } elseif (($num_start - $input_start) !== 0){
        $errors["float"] = "Число не може бути дробовим";
    }
}

if ($input_end === null) {
    $errors["null"] = "Значення не введено";
} elseif ($input_end === "") {
     $errors["empty"] = "Значення не може бути пусте";
} else {
    $num_end = (int) $input_end;
    if ($num_end === 0 && $input_end !== "0") {
        $errors["chars"] = "Значення не має містити зайвих символів";
    } elseif (($num_end - $input_end) !== 0){
        $errors["float"] = "Число не може бути дробовим";
    }
}

if (count($errors) == 0) {
    $is_valid = true;
}
var_dump($is_valid);

// var_dump(4 === '4.0');