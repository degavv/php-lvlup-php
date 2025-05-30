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

    public function add(string $login, string $password, string $email)
    {
        $selectLogin = "SELECT login FROM users WHERE login = '$login';";
        $selectEmail = "SELECT email FROM users WHERE email = '$email';";
        $insertQuery = "INSERT INTO users (login, password, email) VALUES ('$login', '$password', '$email')";
        
        $resultLogin = $this->db->query($selectLogin);
        $existingLogin = $resultLogin[0]['login'];
        $resultEmail = $this->db->query($selectEmail);
        $existingEmail = $resultEmail[0]['email'];
        if($existingLogin !== null){
            return 'this login already exists';
        }
        elseif ($existingEmail !== null){
            return 'this email already exists';
        }
        else {
            $status = $this->db->query($insertQuery);
            if ($status) {
                return true;
            }
        }
        return false;
    }

    public function delete(string $login)
    {
        $selectQuery = "SELECT * FROM users WHERE login = '$login';";
        $deleteQuery = "DELETE FROM users WHERE login = '$login';";
        if ($this->db->query($selectQuery)) {
            $this->db->query($deleteQuery);
            return true;
        }
        return false;
    }

    public function all()
    {
        $query = "SELECT login FROM users;";
        return $this->db->query($query);
    }
}