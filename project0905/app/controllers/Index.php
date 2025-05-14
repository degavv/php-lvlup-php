<?php

namespace app\controllers;

use app\core\View;
use app\models\ArticleRepository;
use app\models\CommentRepository;
use app\core\Route;
/**
 * main page controller
 */
class Index
{
    protected $view;
    protected $article;
    protected $comment;

    public function __construct()
    {
        $this->view = new View();
        $this->article = ArticleRepository::getInstance();
        $this->comment = CommentRepository::getInstance();
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
        $comments = $this->comment->find('articleId',$id);
        $this->view->render('index_read', [
            'id' =>$id,
            'title' => $article_title,
            'article_title' => $article_title,
            'article_content' => $article_content,
            'comments' => $comments,
        ]);
    }

    public function comment():void
    {
        $id = (int) $_POST['id'];
        $name = $_POST['name'];
        $comment = $_POST['comment'];
        $this->comment->add($id,$name, $comment);
        Route::redirect(Route::url('index', 'read', ['id' => $id]));
    }
}