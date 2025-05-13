<?php

namespace app\controllers;

use app\core\View;
use app\models\ArticleRepository;
use app\core\Route;
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
        $this->article = new ArticleRepository(ARTICLES_FILE);
    }
    /**
     * index action handler
     * @return void
     */
    public function index(): void
    {
        $articles = $this->article->all();
        $this->view->render('index_index', ['title' => 'Home', 'articles' => $articles,]);
    }
    /**
     * read an article handler
     * @return void
     */
    public function read(): void
    {
        $idRaw = $_GET['id'] ?? null;
        if (!is_numeric($idRaw)) {
            Route::notFound();
        }

        $id = (int) $idRaw;
        $results = $this->article->find('id', $id);

        if (empty($results)) {
            Route::notFound();
        }
        $article = $results[0];
        $article_title = $article['title'];
        $article_content = $article['content'];
        // var_dump($article_content, $article_title);
        $this->view->render('index_read', [
            'title' => $article_title,
            'article_title' => $article_title,
            'article_content' => $article_content,
        ]);
    }

    public function comment():void
    {
        $id = $_POST['id'];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        var_dump($id, $name, $comment);
    }

}