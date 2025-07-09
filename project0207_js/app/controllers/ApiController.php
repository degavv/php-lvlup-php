<?php

namespace app\Controllers;

use app\models\PhotoModel;
use app\validators\PhotoValidator;

class ApiController
{
    protected $photoModel;
    public function __construct()
    {
        $this->photoModel = new PhotoModel();
    }

    public function all_photos()
    {
        $photos = $this->photoModel->all();
        header('Content-Type: application/json');
        echo json_encode($photos);
    }

    public function upload_photo()
    {
        $photo = $_FILES['image'];
        $errors = PhotoValidator::validate($photo);
        if (empty($errors)) {
            $this->photoModel->store($photo);
            http_response_code(201);
        } else {
            header('Content-Type: application/json');
            http_response_code(422);
            $params['errors'] = $errors;
            echo json_encode($params);
        }
    }
}