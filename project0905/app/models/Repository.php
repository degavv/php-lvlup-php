<?php

namespace app\models;

abstract class Repository
{
    protected Storage $storage;
    public function __construct($fileJSON)
    {
        
        $this->storage = new Storage($fileJSON);
    }
    public function find(string $key, mixed $value): array
    {
        $items = $this->storage->all();
        if (empty($items)){
            return [];
        }
        $items = array_filter($items, function ($item) use ($key, $value) {
            return isset($item[$key]) && $item[$key] == $value;
        });
        
        return $items;
    }
}