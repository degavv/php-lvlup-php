<?php

namespace app\models;
use app\models\Repository;
use app\core\Session;

class Auth extends Repository{
    protected static $instance = null;
    public static function getInstance()
    {
        if (is_null(self::$instance)){
            self::$instance = new self(PASSWD_FILE);
        }
        return self::$instance;
    }

    public function checkUser(string $login, string $pass): bool
    {
        $result = $this->find('login', $login);
        if (!empty($result)){
            $user = $result[0];
            $password = $user['pass'];
            if (password_verify($pass, $password)){
                return true;
            }
        }
        
        return false;
    }

    public static function getAuthStatus(): bool
    {
        Session::start();
        if (Session::get('login') !== false){
            // $this->isAuth = true;
            return true;
        }
        return false;
    }

}