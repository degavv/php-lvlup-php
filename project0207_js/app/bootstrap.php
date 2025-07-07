<?php

include_once '..' . DIRECTORY_SEPARATOR . 'app' . DIRECTORY_SEPARATOR . 'config.php';

/**
 * Autoloader for class files.
 */
spl_autoload_register(function ($className){
    $classPath = '../' . str_replace('\\', DIRECTORY_SEPARATOR, $className) . '.php';
    if(file_exists($classPath)){
        include_once $classPath;
        return true;
    }
    return false;
});

/**
 * Start the application routing
 */
\app\core\Route::init();