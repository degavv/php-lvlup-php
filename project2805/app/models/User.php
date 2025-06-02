<?php

namespace app\models;
use app\models\Database;

class User
{
    protected Database $db;
    public function __construct()
    {
        $this->db = Database::getInstance();
    }

    // public function add(string $login, string $password, string $email)
    // {
    //     $selectLogin = "SELECT login FROM users WHERE login = '$login';";
    //     $selectEmail = "SELECT email FROM users WHERE email = '$email';";
    //     $insertQuery = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";

    //     $resultLogin = $this->db->query($selectLogin);
    //     $existingLogin = $resultLogin[0]['login'];
    //     $resultEmail = $this->db->query($selectEmail);
    //     $existingEmail = $resultEmail[0]['email'];
    //     if($existingLogin !== null){
    //         return 'this login already exists';
    //     }
    //     elseif ($existingEmail !== null){
    //         return 'this email already exists';
    //     }
    //     else {
    //         $status = $this->db->query($insertQuery);
    //         if ($status) {
    //             return true;
    //         }
    //     }
    //     return false;
    // }

    public function add(string $login, string $password, string $email)
    {
        $insertQuery = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";

        $status = $this->db->query($insertQuery);
        if ($status) {
            return true;
        }

        return false;
    }

    public function delete(int|string $id)
    {
        $query = "DELETE FROM users WHERE id = '$id';";
        if ($this->db->query($query)) {
            return true;
        }
        return false;
    }

    public function all()
    {
        $query = "SELECT id,login FROM users;";
        return $this->db->query($query);
    }

    public function find(string $field, string $value)
    {
        $query = "SELECT * FROM users WHERE $field = '$value';";
       
        return $this->db->query($query);
    }
}