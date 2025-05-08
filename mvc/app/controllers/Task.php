<?php

namespace app\controllers;

use app\core\Route;
use app\core\View;
use app\models\Task as TaskModel;
/**
 * Task Controller
 */
class Task
{
    protected View $view;
    protected TaskModel $model;

    public function __construct()
    {
        $this->view = new View();
        $this->model = new TaskModel();
    }
    /**
     * task display handler
     * @return void
     */
    public function index(): void
    {
        $this->view->render('task_index', [
            'title' => 'Tasks',
            'tasks' => $this->model->all(),
        ]);
    }
    /**
     * task creation handler
     * @return void
     */
    public function create(): void
    {
        $this->view->render('task_create', [
            'title' => 'Create new task',
        ]);
    }
    /**
     * task saving handler
     * @return never
     */
    public function store(): never
    {
        $task = filter_input(INPUT_POST, 'task');
        $this->model->add($task);
        Route::redirect(Route::url('task'));
    }
    /**
     * task deleting handler
     * @return never
     */
    public function delete(): never
    {
        $id = filter_input(INPUT_GET, 'id');
        $this->model->delete($id);
        Route::redirect(Route::url('task'));
    }
    /**
     * task editing handler
     * @return void
     */
    public function edit(): void
    {
        $id = filter_input(INPUT_GET, 'id');
        $task = $this->model->getTaskById($id);
        $this->view->render('task_edit', [
            'title' => 'Edit task',
            'id' => $id,
            'task' => $task,
        ]);
    }
    /**
     * task update handler
     * @return never
     */
    public function update(): never
    {
        $id = filter_input(INPUT_POST, 'id');
        $taskUpdated = filter_input(INPUT_POST, 'task');
        $task = $this->model->getTaskById($id);
        if ($taskUpdated !== $task){
            $this->model->update($id, $taskUpdated);
        }
        Route::redirect(Route::url('task'));
    }
}