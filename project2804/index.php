<?php

spl_autoload_register(function ($className): bool {
    $classFile = 'library' . DIRECTORY_SEPARATOR . $className . '.php';
    if (file_exists($classFile)) {
        include_once $classFile;
        return true;
    }
    return false;
});

$house = new Building(10, 20, 'Зелений', 3);
echo ($house);