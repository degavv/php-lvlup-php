<?php

namespace app\controllers;

use app\core\Route;
use app\core\View;
use app\models\ArticleRepository;
use app\models\CommentRepository;
use app\models\Session;
use app\controllers\Auth;

class Admin
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
        Auth::accessAllowed();
        $articles = $this->article->all();
        $this->view->render('admin_index', ['title' => 'Admin Panel', 'articles' => $articles,]);
    }
    public function delete(): never
    {
        Auth::accessAllowed();
        $id = (int) $_GET['id'];
        $this->article->delete($id);
        $this->comment->delete($id);
        Route::redirect(Route::url('admin', 'index'));
    }
    public function create(): void
    {
        Auth::accessAllowed();
        $this->view->render('article_create');
    }
    public function save(): never
    {
        Auth::accessAllowed();
        $title = $_POST['title'];
        $content = $_POST['content'];
        $this->article->add($title, $content);
        Route::redirect(Route::url('admin', 'index'));
    }
    public function edit()
    {
        Auth::accessAllowed();
        $id = (int) $_GET['id'];
        $results = $this->article->find('id', $id);
        $article = $results[0];
        $title = $article['title'];
        $content = $article['content'];
        $this->view->render('article_edit', ['title' => $title, 'content' => $content, 'id' => $id]);
    }
    public function update()
    {
        Auth::accessAllowed();
        $id = $_POST['id'];
        $title = $_POST['title'];
        $content = $_POST['content'];
        $this->article->update($id,$title, $content);
        Route::redirect(Route::url('admin', 'index'));
    }
}