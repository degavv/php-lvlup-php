<?php

function index(): void
{
    view('index', ['hide_login_form' => isAuth()]);
    login();
    // saveCredentials('','123qwe');
}

function registration(): void
{
    $redirectUrl = '/registration.php';
    view('registration');

    $regCredentials = getRegCredentials();
    if ($regCredentials){
        $isValid = validateRegCredentials($regCredentials);
        if ($isValid){
            $isSave = saveCredentials($regCredentials);

        }
    }

    if ($isSave){
        redirect();
    }
}