<?php

include_once 'app/config.php';

spl_autoload_register(function ($className): bool {
    $classFile = 'app/library/' . $className . '.php';
    if (file_exists($classFile)) {
        include_once $classFile;
        return true;
    }
    return false;
});