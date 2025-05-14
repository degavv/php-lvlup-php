<?php

namespace app\controllers;
use app\core\View;
use app\models\Auth as AuthModel;


class Auth
{
    protected $view;
    protected $auth;
    public function __construct()
    {
        $this->auth = AuthModel::getInstance();
        $this->view = new View();
    }
    public function index()
    {
        $this->view->render('auth_index');
    }

    public function signin()
    {
        $login = $_POST['login'];
        $pass = $_POST['pass'];
        // var_dump($login, $pass);
        $this->auth->checkUser($login, $pass);
    }
}