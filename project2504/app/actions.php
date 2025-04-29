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
    if($userName !==null){
        $isAuth = true;
    }
    view('index', [
        'is_auth' => $isAuth,
        'user_name' => $userName,
        'error_msg' => $errorMsg,
    ]);
}

function registration(): void
{
    $isAuth = false;
    // $redirectUrl = '/registration.php';
    view('registration', ['is_auth' => $isAuth], 'registration');

    // $regCredentials = getRegCredentials();
    // if ($regCredentials) {
    //     $isValid = validateRegCredentials($regCredentials);
    //     if ($isValid) {
    //         $isSave = saveCredentials($regCredentials);

    //     }
    // }

    // if ($isSave) {
    //     redirect();
    // }
}