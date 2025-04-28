<?php

function isAuth(): bool
{
    return false;
}

function redirect(string $url = '/index.php'): never
{
    header('Location: ' . $url);
    exit();
}

function getUserByLogin(string $login): array|null
{
    $handle = fopen(PATH_TO_CRED, 'r');
    $credentials = ['login', 'pass'];
    $findedUser = null;
    while (!feof($handle)) {
        $user = fgetcsv($handle);
        if ($user[0] === $login) {
            $findedUser = array_combine($credentials, $user);
            break;
        }
    }
    fclose($handle);
    return $findedUser;
}

function login()
{
    $login = filter_input(INPUT_POST, 'login');
    $login = $login ? htmlspecialchars($login, ENT_QUOTES, 'UTF-8') : null;
    $pass = filter_input(INPUT_POST, 'pass');
    $user = getUserByLogin($login);
    if (!$user) {
        //TODO error no login or pass
        exit('Incorrect login or password');
    } else {
        if (!password_verify($pass, $user['pass'])) {
            //TODO error no login or pass
            exit('Incorrect login or password');
        } else {
            exit('Hello, ' . $login);
        }
    }
}

function view(string $page, array $params = [], string $layout = "default"): void
{
    $components = [
        'registration_btn',
        'login_form',
        'logout_form',
        'create_article_btn',
    ];
    include_once 'app/views/layouts/' . $layout . '.php';
}

//Registration

function getRegCredentials(): array
{
    $newUserCred = null;
    $login = filter_input(INPUT_POST, 'login_reg');
    $pass = filter_input(INPUT_POST, 'pass_reg');
    $passRepeat = filter_input(INPUT_POST, 'repeat_pass_reg');
    return $newUserCred = [
        'login' => $login,
        'pass' => $pass,
        'pass_repeat' => $passRepeat,
    ];
}

function validateRegCredentials($credentials): array
{
    //TODO errors
    $errors = [];

    foreach ($credentials as $value) {
        if (empty($value)) {
            $errors[] = 'Значення не може бути пустим';
        }
    }
    extract($credentials);

    // Перевірка відповідності повтору пароля
    if ($pass !== $pass_repeat){
        $errors[] = 'Введені паролі не співпадають';
    }
    // Перевірка логіна
    if (strlen($login) < 3 || strlen($login) > 50) {
        $errors[] = 'Логін має бути від 3 до 50 символів.';
    } elseif (!preg_match('/^[a-zA-Z0-9_]+$/', $login)) {
        $errors[] = 'Логін може містити тільки літери, цифри та підкреслення.';
    }

    // Перевірка пароля
    if (strlen($pass) < 6) {
        $errors[] = 'Пароль має бути не коротший за 6 символів.';
    }
    var_dump($errors);
    return $errors;
}

function saveCredentials($validateCredentials): bool
{
    $login = $validateCredentials['login'];
    $pass = $validateCredentials['pass'];
    $passHash = password_hash($pass, PASSWORD_DEFAULT);
    $credentials = [$login, $passHash];
    $handle = fopen(PATH_TO_CRED, 'a');
    if ($handle) {
        fputcsv($handle, $credentials);
        fclose($handle);
        return true;
    } else {
        return false;
    }
    // var_dump(password_hash($pass, PASSWORD_DEFAULT));
}

