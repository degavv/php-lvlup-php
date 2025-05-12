<?php

namespace app\controllers;

use app\core\View;
use app\models\Article;
use app\core\Route as Route;

class Admin
{
    protected $view;
    protected $article;

    public function __construct()
    {
        $this->view = new View();
        $this->article = new Article();
    }
    /**
     * index action handler
     * @return void
     */
    public function index(): void
    {
        $articles = $this->article->all();
        $this->view->render('admin_index', ['title' => 'Admin Panel', 'articles' => $articles,]);
    }
}