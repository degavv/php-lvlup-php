<?php

namespace app\controllers;

use app\core\View;
use app\models\Article;
/**
 * main page controller
 */
class Index
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
    public function index() : void
    {
        $articles = $this->article->all();
        $this->view->render('index_index', ['title' => 'Home', 'articles' => $articles,]);
    }
}