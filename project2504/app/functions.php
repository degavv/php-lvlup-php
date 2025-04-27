<?php

function isAuth(): bool
{
    return false;
}

function saveCredentials ($login, $pass)
{
    var_dump(password_hash($pass, PASSWORD_DEFAULT));
}

function getUserByLogin(string $login){
    $handle = fopen('storage/passwd.csv', 'r');
    while(!feof($handle));  
}
function login(){
    $login = filter_input(INPUT_POST, 'login');
    $login = $login ? htmlspecialchars($login, ENT_QUOTES, 'UTF-8') : null;
    $pass = filter_input(INPUT_POST, 'pass');
    var_dump($login, $pass);
}

function view(string $page, array $params = [], string $layout = "default"): void
{
    include_once 'app/views/layouts/' . $layout . '.php';
}

