<?php

namespace app\controllers;

use app\core\View;
use app\core\Route;
use app\models\User;
/**
 * main page controller
 */
class Index
{
    protected $view;

    protected $user;

    public function __construct()
    {
        $this->view = new View('admin');
        $this->user = new User();
    }
    /**
     * index action handler
     * @return void
     */
    public function index(): void
    {
        $users = $this->user->all();
        $this->view->render('admin_index', ['users' => $users,]);
    }

    public function create()
    {
        $this->view->render('user_create');
    }

    public function save(): never
    {
        $login = $_POST['login'];
        $password = $_POST['password'];
        $email = $_POST['email'];
        // $email = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
        $status = $this->user->add($login, $password, $email);

        // var_dump($login, $password, $email);
        if (is_string($status)) {
        //     Route::redirect(Route::url('index', 'create', [
        //         'login' => $login, 
        //         'password' => $password, 
        //         'email' => $email, 
        //         'error' => $status,
        // ]));
            
        }
        Route::redirect(Route::url());
    }
    /**
     * read an article handler
     * @return void
     */
    // public function read(): void
    // {
    //     $idRaw = $_GET['id'] ?? null;
    //     if (!is_numeric($idRaw)) {
    //         Route::notFound();
    //     }

    //     $id = (int) $idRaw;
    //     $results = $this->article->find('id', $id);

    //     if (empty($results)) {
    //         Route::notFound();
    //     }
    //     $article = $results[0];
    //     $article_title = $article['title'];
    //     $article_content = $article['content'];
    //     $comments = $this->comment->find('articleId',$id);
    //     $this->view->render('index_read', [
    //         'id' =>$id,
    //         'title' => $article_title,
    //         'article_title' => $article_title,
    //         'article_content' => $article_content,
    //         'comments' => $comments,
    //     ]);
    // }

    // public function comment():void
    // {
    //     $id = (int) $_POST['id'];
    //     $name = $_POST['name'];
    //     $comment = $_POST['comment'];
    //     $this->comment->add($id,$name, $comment);
    //     Route::redirect(Route::url('index', 'read', ['id' => $id]));
    // }
}