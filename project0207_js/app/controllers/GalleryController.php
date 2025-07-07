<?php

namespace app\controllers;
use app\core\View;
// use app\core\Route;

class GalleryController
{
    protected $view;
    public function __construct()
    {
        $this->view = new View();
    }

    public function index()
    {
        $this->view->render('index_index');
    }
}