<?php

namespace app\models;

use mysqli;

class Database
{
    protected static $instance = null;
    protected $connector;
    protected function __construct()
    {
        $this->connector = new mysqli(
            DB_HOST,
            DB_USER,
            DB_PASS,
            DB_NAME
        );
    }
    protected function __clone()
    {
    }
    protected function __wakeup()
    {
    }

    public static function getInstance(): Database
    {
        if (is_null(self::$instance)) {
            self::$instance = new self();
        }
        return self::$instance;
    }

    public function query($query): array|bool|null
    {
        $result = $this->connector->query($query);
        if (is_bool($result)) {
            return $result;
        }
        $data = [];
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
        return $data;
    }
}