<?php

function getMassIndex ($heightInCent, $weightInKilo){
    if ($heightInCent <= 0 || $weightInKilo <= 0) {
        return false;
    }
    $height = $heightInCent / 100;
    $weight = $weightInKilo;
    $massIndex = $weight / $height **2;
    return $massIndex;
}

function getDietAdvice ($massIndex){
    if ($massIndex){
        $advice = "";
        if ($massIndex < 17.25){
            $advice = "Необхідно значно збільшити калорійність раціону";
        } elseif ($massIndex < 18.5){
            $advice = "Необхідно трохи збільшити калорійність раціону";
        } elseif ($massIndex < 25){
            $advice = "Продовжуйте харчуватися з тією ж калорійністю";
        } elseif ($massIndex < 32.5){
            $advice = "Необхідно трохи зменшити калорійність раціону ";
        } else {
            $advice = "Необхідно значно зменшити калорійність раціону";
        }
    } else{
        return false;
    }
    return $advice;
}
function readAndDisplayBMI (){
    if ($_SERVER["REQUEST_METHOD"] === "GET");{
        $inputHeight = $_GET["height"];
        $inputWeigh = $_GET["weight"];
        $height = (int) $inputHeight;
        $weight = (int) $inputWeigh;
        $massIndex = getMassIndex($height, $weight);
        if ($massIndex){
            $advice = getDietAdvice($massIndex);
            if ($advice){
                echo "$advice";
            } else {
                echo"Сталася помилка при визначенні рекомендації з харчування";
            }
        } else {
            echo"Сталася помилка при обчисленні індексу маси тіла";
        }
    }
}

readAndDisplayBMI() ;