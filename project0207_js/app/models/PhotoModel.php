<?php
namespace app\models;

class PhotoModel
{
    public function __construct()
    {
        $this->checkDir();
    }

    protected function checkDir(): void
    {
        if (!is_dir(PHOTO_UPLOAD_DIR)) {
            mkdir(PHOTO_UPLOAD_DIR, 0755, true);
        }
    }

    public function all(): array
    {
        $photos = [];
        $scanned_dir = scandir(PHOTO_UPLOAD_DIR);
        if ($scanned_dir) {
            $photos = array_diff($scanned_dir, array('..', '.'));
            $photos = array_filter($photos, function ($file) {
                return in_array(mime_content_type(PHOTO_UPLOAD_DIR . DIRECTORY_SEPARATOR . $file), PHOTO_AVAILABLE_TYPES);
            });
        }

        return $photos;
    }

    public function store(array $uploadedFile): string
    {
        $newName = uniqid() . '_' . basename($uploadedFile['name']);
        $destination = PHOTO_UPLOAD_DIR . DIRECTORY_SEPARATOR . $newName;
        move_uploaded_file(($uploadedFile['tmp_name']), $destination);

        return $newName;
    }
}
