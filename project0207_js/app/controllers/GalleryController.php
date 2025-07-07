<?php

namespace app\controllers;
use app\core\View;
use app\models\PhotoModel;
// use app\core\Route;

class GalleryController
{
    protected $view;
    protected $photo;
    public function __construct()
    {
        $this->view = new View();
        $this->photo = new PhotoModel();
    }

    public function index()
    {
        $photos = $this->photo->all();
        $this->view->render('index_index' ,['photos' => $photos,]);
    }

}