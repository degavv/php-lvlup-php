<?php

namespace app\controllers;

use app\core\View;
use app\core\Route;
use app\models\User;
/**
 * main page controller
 */
class Index
{
    protected $view;

    protected $user;

    public function __construct()
    {
        $this->view = new View('admin');
        $this->user = new User();
    }
    /**
     * index action handler
     * @return void
     */
    public function index(): void
    {
        $users = $this->user->all();
        $this->view->render('admin_index', ['users' => $users,]);
    }

    public function create()
    {
        $this->view->render('user_create');
    }

    public function save(): void
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);

        $checkLogin = $this->user->find('login', $login);
        $checkEmail = $this->user->find('email', $email);

        $existingLogin = $checkLogin[0]['login'];
        $existingEmail = $checkEmail[0]['email'];
        if ($existingLogin !== null) {
            $error = 'this login already exists';
        } elseif ($existingEmail !== null) {
            $error = 'this email already exists';
        } else {
            $passHash = password_hash($password, PASSWORD_DEFAULT);
            $status = $this->user->add($login, $passHash, $email);
            if ($status) {
                Route::redirect(Route::url());
            } else {
                $error = 'An error occurred. Please try again.';
            }
        }

        $this->view->render('user_create', ['error' => $error, 'login' => $login, 'password' => $password, 'email' => $email,]);
    }

    public function delete(): never
    {
        $id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
        $this->user->delete($id);

        Route::redirect(Route::url());
    }
}