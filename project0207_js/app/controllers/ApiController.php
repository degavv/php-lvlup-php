<?php

namespace app\Controllers;

use app\models\PhotoModel;
use app\validators\Validator;

/**
 * API Controller for photos
 */
class ApiController
{
    /**
     * New PhotoModel object
     * @var PhotoModel
     */
    protected PhotoModel $photoModel;
    public function __construct()
    {
        $this->photoModel = new PhotoModel();
    }
    /**
     * Returns JSON assoc with all photos
     * @return void
     */
    public function all_photos(): void
    {
        $photos = $this->photoModel->all();
        $response = ['path' => PHOTO_UPLOAD_DIR];
        $response['photos'] = $photos;
        header('Content-Type: application/json');
        echo json_encode($response);
    }
    /**
     * Returns http_response 201 code on success or 422 code with JSON errors on failure
     * @return void
     */
    public function upload_photo(): void
    {
        $photo = $_FILES['image'];
        $errors = Validator::validate($photo);
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