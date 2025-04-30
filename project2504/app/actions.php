<?php

// $isAuth = checkSession();
function signin(): void
{
    login();
}

function index(): void
{
    $isAuth = false;
    $userName = getSessionValue('login');
    $errorMsg = getSessionValue('error_msg');
    // session_start();
    // var_dump($_SESSION);
    // var_dump($_REQUEST);
    // var_dump($_COOKIE);
    if ($userName !== null) {
        $isAuth = true;
    }
    view('index', [
        'is_auth' => $isAuth,
        'user_name' => $userName,
        'error_msg' => $errorMsg,
    ]);
}

function createArticle(): void
{
    view('create_article');
}

function registration(): void
{
    $isAuth = false;
    $userName = getSessionValue('login');
    $errorMsg = getSessionValue('error_msg');
    // $redirectUrl = '/registration.php';
    view('registration', [
        'is_auth' => $isAuth,
        'user_name' => $userName,
        'error_msg' => $errorMsg,
    ], 'registration');
}

function regNewUser(): never
{
    if (checkPost()) {
        $regCredentials = getRegCredentials();
        if ($regCredentials) {
            $isValid = validateRegCredentials($regCredentials);
            if ($isValid) {
                $login = saveCredentials($regCredentials);
                if ($login !== null) {
                    $_SESSION['login'] = $login;
                    unset($_SESSION['error_msg']);
                    redirect();
                }
            }
        }
    }
    $_SESSION['error_msg'] = 'Сталась помилка при реєстрації. Спробуйте ще раз';
    redirect('registration.php');
}




