<?php

namespace app\models;

class Session
{
    // public function __construct(){
    //     if(session_status() === PHP_SESSION_NONE) session_start();
    // }
    public static $isStart = false;
    public static function start(): void
    {
        if(session_status() === PHP_SESSION_NONE) session_start();
        self::$isStart = true;
    }
    public static function getMany(array $keys): mixed
    {   
        $values = [];

        foreach ($keys as $key){
            if(isset($_SESSION[$key])){
                $values[$key] = $_SESSION[$key];
            }
        }
        if(count($values) === 0){
            return null;
        }

        return $values;
    }

    public static function get(string $key)
    {
        if(isset($_SESSION[$key])){
            return $_SESSION[$key];
        }
        return false;
    }

    public static function set(string $key, mixed $value): mixed
    {
        return $_SESSION[$key] = $value;
    }

    public static function unset(string $key):bool
    {
        if (self::get($key) !== false){
            unset($_SESSION[$key]);
            return true;
        }
        return false;
    }

    public static function close()
    {
        $_SESSION = [];
        $cookieParams = session_get_cookie_params();
        setcookie(
            session_name(),
            '',
            time() - 3600,
            $cookieParams["path"],
            $cookieParams["domain"],
            $cookieParams["secure"],
            $cookieParams["httponly"]
        );
        session_destroy();
    }
}