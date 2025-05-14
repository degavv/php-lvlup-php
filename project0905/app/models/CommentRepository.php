<?php
//TODO Винести в батьківський клас конструктор та властивість storage
namespace app\models;
use \app\models\Storage;

/**
 * JSON comments structure
 * [
 *  {
 *   "articleId": 1,
 *   "author": "Nick",
 *   "content": "Text"
 * },
 * ...
 * ]
 */
class CommentRepository extends Repository
{
    protected static $instance = null;
    public static function getInstance()
    {
        if (is_null(self::$instance)){
            self::$instance = new self(COMMENTS_FILE);
        }
        return self::$instance;
    }
    public function add(int $articleId, string $name, string $comment): void
    {
        $newComment = ['articleId' => $articleId, 'name' => $name, 'comment' => $comment];
        $this->storage->add($newComment);
    }
    public function delete(int $articleId)
    {
        $this->storage->deleteByField('articleId', $articleId);
    }
}