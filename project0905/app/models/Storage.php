<?php

namespace app\models;

class Storage
{
    protected $data = [];
    protected $fileJSON;

    public function __construct(string $fileJSON)
    {
        $this->fileJSON = $fileJSON;
        $this->readData();
    }

    /**
     * Reads articles from a file and returns them as a list
     * @return void
     */
    protected function readData(): void
    {
        if (file_exists($this->fileJSON)) {
            $dataJson = file_get_contents($this->fileJSON);
            $data = json_decode($dataJson, true);
            if ($data) {
                $this->data = $data;
            }
        }
    }

    /**
     * Saves articles to the JSON file
     * @return void
     */
    protected function saveData(): void
    {
        $dataJson = json_encode($this->data, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);
        file_put_contents($this->fileJSON, $dataJson);
    }

    /**
     * Returns all elements of the json file as an associative array and sorts them by date field (if any) in descending order
     * @return mixed
     */
    public function all(): array
    {
        $data = $this->data;
        if(!isset($data[0]['date'])){
            return $data;
        }
        uasort($data, function ($a, $b) {
            return $b['date'] <=> $a['date'];
        });

        return $data;
    }
    /**
     * adds articles to the array and saves them to a file
     * @param string $article
     * @return void
     */
    public function add(array $item): void
    {
        $this->data[] = $item;
        $this->saveData();
    }

    /**
     * deletes articles from the array and saves them to a file
     * @param int $id
     * @return void
     */
    public function delete(int $id): bool
    {
        foreach ($this->data as $index => $item) {
            if (isset($item['id']) && $item['id'] == $id) {
                unset($this->data[$index]);
                $this->data = array_values($this->data);
                $this->saveData();
                return true;
            }
        }

        return false;
    }

    /**
     * returns article by id
     * @param int $id
     * @return string
     */
    public function find(int $id): ?array
    {
        
        return $this->data[$id] ?? null;
    }

    public function update(int $id, array $newData): bool
    {
        foreach ($this->data as $index => $item) {
            if (isset($item['id']) && $item['id'] == $id) {
                $this->data[$index] = array_merge($item, $newData);
                $this->saveData();
                return true;
            }
        }
        return false;
    }

    public function deleteByField(string $key, mixed $value)
    {
        // фільтруємо які не відповідають key=value
        $this->data = array_filter($this->data, function ($item) use ($key, $value) {
            return !isset($item[$key]) || $item[$key] != $value;
        });
        $this->data = array_values($this->data);
        $this->saveData();
    }
}