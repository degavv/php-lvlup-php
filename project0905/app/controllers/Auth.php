<?php

namespace app\controllers;
use app\core\Route;
use app\core\View;
use app\models\Auth as AuthModel;
use app\models\Session;

//TODO CheckSession, CreateSession, CheckUser, CreateUser
class Auth
{
    protected $view;
    protected $auth;

    public function __construct()
    {
        $this->auth = AuthModel::getInstance();
        $this->view = new View();
        Session::start();
    }

    public function index()
    {
        $this->view->render('auth_index');
    }

    public function login(): never
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        $isValid = $this->auth->checkUser($login, $pass);
        if ($isValid){
            Session::set('login', $login);
            Session::unset('error_login');
            Route::redirect(Route::url('admin'));
        }
        Session::set('error_login','Incorrect login or password');
        Route::redirect(Route::url('auth'));
    }

    public function logout()
    {
        Session::close();
        Route::redirect(Route::url('auth'));
    }

    public static function accessAllowed()
    {
        $authStatus = AuthModel::getAuthStatus();
        if (!$authStatus){
            Route::redirect(Route::url('auth', 'index'));
        }
    }

}