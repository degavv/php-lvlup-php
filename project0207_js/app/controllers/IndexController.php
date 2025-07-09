<?php

namespace app\controllers;
use app\core\View;
use app\models\PhotoModel;
/**
 * Index Controller
 */
class IndexController
{
    /**
     * new View object
     * @var View
     */
    protected View $view;
    /**
     * new PhotoModel object
     * @var PhotoModel
     */
    protected PhotoModel $photo;
    public function __construct()
    {
        $this->view = new View();
        $this->photo = new PhotoModel();
    }
    /**
     * Basic method
     * @return void
     */
    public function index(): void
    {
        $photos = $this->photo->all();
        $this->view->render('index_index', ['photos' => $photos,]);
    }
}