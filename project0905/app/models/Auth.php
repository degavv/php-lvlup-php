<?php

namespace app\models;
use app\models\Storage;
use app\models\Repository;

class Auth  extends Repository{
    protected static $instance = null;
    public static function getInstance()
    {
        if (is_null(self::$instance)){
            self::$instance = new self(PASSWD_FILE);
        }
        return self::$instance;
    }
    // protected $isAuth;
    // protected Storage $storage;
    // public function __construct()
    // {
    //     $this->storage = new Storage(PASSWD_FILE);
    // }
    public function checkUser(string $login, string $pass): bool
    {
        $this->storage->find();
    }
}