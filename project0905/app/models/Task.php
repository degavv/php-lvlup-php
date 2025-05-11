<?php

namespace app\models;

/**
 * Responsible for writing and reading tasks from the file
 */
class Task
{
    protected $tasks = [];

    public function __construct()
    {
        $this->readTasks();
    }
    /**
     * Reads tasks from a file and returns them as a list
     * @return void
     */
    protected function readTasks(): void
    {
        if (file_exists(ARTICLES_FILE)) {
            $tasksJson = file_get_contents(ARTICLES_FILE);
            $tasks = json_decode($tasksJson);
            if ($tasks) {
                $this->tasks = $tasks;
            }
        }
    }
    /**
     * Saves tasks to the JSON file
     * @return void
     */
    protected function saveTasks(): void
    {
        $tasksJson = json_encode($this->tasks);
        file_put_contents(ARTICLES_FILE, $tasksJson);
    }
    /**
     * returns all tasks
     * @return mixed
     */
    public function all(): mixed
    {
        return $this->tasks;
    }
    /**
     * adds tasks to the array and saves them to a file
     * @param string $task
     * @return void
     */
    public function add(string $task): void
    {
        $this->tasks[] = $task;
        $this->saveTasks();
    }
    /**
     * deletes tasks from the array and saves them to a file
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        array_splice($this->tasks, $id, 1);
        $this->saveTasks();
    }
    /**
     * adds tasks to the array and saves them to a file
     * @param int $id
     * @param string $task
     * @return void
     */
    public function update(int $id, string $task): void
    {
        $this->tasks[$id] = $task;
        $this->saveTasks();
    }
    /**
     * returns task by id
     * @param int $id
     * @return string
     */
    public function getTaskById(int $id): string
    {
        return $this->tasks[$id];
    }
}