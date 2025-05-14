<?php

namespace app\models;

abstract class Repository
{
    // abstract protected $instance;
    protected Storage $storage;
    protected function __construct($fileJSON)
    {
        $this->storage = new Storage($fileJSON);
    }

    protected function __clone()
    {

    }
    protected function __wakeup()
    {

    }

    // public static function getInstance($fileJSON)
    // {
    //     if (is_null(self::$instance)){
    //         self::$instance = new self($fileJSON);
    //     }
    //     return self::$instance;
    // }

    public function find(string $key, mixed $value): array
    {
        $items = $this->storage->all();
        if (empty($items)){
            return [];
        }
        $items = array_filter($items, function ($item) use ($key, $value) {
            return isset($item[$key]) && $item[$key] == $value;
        });
        return array_values($items);
    }
}