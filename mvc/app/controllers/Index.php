<?php

namespace app\controllers;

use app\core\View;
/**
 * main page controller
 */
class Index
{
    protected $view;

    public function __construct()
    {
        $this->view = new View();
    }
    /**
     * index action handler
     * @return void
     */
    public function index() : void
    {
        $this->view->render('index_index', [
            'title' => 'Home',
        ]);
    }
    /**
     * about action handler
     * @return void
     */
    public function about() : void
    {
        $this->view->render('index_about', [
            'title' => 'About',
        ]);
    }
}