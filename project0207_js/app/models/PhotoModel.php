<?php
namespace app\models;
/**
 * Class PhotoModel
 */
class PhotoModel
{
    public function __construct()
    {
        $this->checkDir();
    }
    /**
     * Check dir and create it
     * @return void
     */
    protected function checkDir(): void
    {
        if (!is_dir(PHOTO_UPLOAD_DIR)) {
            mkdir(PHOTO_UPLOAD_DIR, 0755, true);
        }
    }
    /**
     * Get all photos from storage
     * @return array
     */
    public function all(): array
    {
        $photos = [];
        $scanned_dir = scandir(PHOTO_UPLOAD_DIR, SCANDIR_SORT_DESCENDING);
        if ($scanned_dir) {
            $photos = array_diff($scanned_dir, array('..', '.'));
            $photos = array_filter($photos, function ($file) {
                return in_array(mime_content_type(PHOTO_UPLOAD_DIR . DIRECTORY_SEPARATOR . $file), PHOTO_AVAILABLE_TYPES);
            });
        }
        $photosList = array_values($photos);

        return $photosList;
    }
    /**
     * Save uploaded photo to storage
     * @param array $uploadedFile
     * @return string
     */
    public function store(array $uploadedFile): string
    {
        // $newName = uniqid() . '_' . basename($uploadedFile['name']);
        $newName = time() . '_' . basename($uploadedFile['name']);
        $destination = PHOTO_UPLOAD_DIR . DIRECTORY_SEPARATOR . $newName;
        move_uploaded_file($uploadedFile['tmp_name'], $destination);

        return $newName;
    }
}
