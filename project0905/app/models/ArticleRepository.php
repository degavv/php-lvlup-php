<?php

namespace app\models;
use app\models\Storage;

class ArticleRepository extends Repository
{
    protected static $instance = null;
    public static function getInstance()
    {
        if (is_null(self::$instance)){
            self::$instance = new self(ARTICLES_FILE);
        }
        return self::$instance;
    }

    public function all(): mixed
    {
        $sorted = $this->storage->all();

        uasort($sorted, function ($a, $b) {
            return $b['date'] <=> $a['date'];
        });

        return $sorted;
    }

    public function add(string $title, string $content): void
    {
        $articles = $this->storage->all();
        $id = $this->generateNextId($articles);
        $date = time();
        $newArticle = [
            'id' => $id,
            'title' => $title,
            'content' => $content,
            'date' => $date,
        ];
        $this->storage->add($newArticle);
    }
        /**
     * adds articles to the array and saves them to a file
     * @param int $id
     * @param string $article
     * @return void
     */
    public function update(int $id, string $title, string $content): void
    {
        $date = time();
        $article = ['title' => $title, 'content' => $content, 'date' => $date];
        $this->storage->update($id, $article);
    }

    public function delete(int $id): void
    {
        $status = $this->storage->delete($id);
        if (!$status){
            exit('Сталась помилка при видаленні');
        }
    }

    private static function generateNextId(array $articles): int
    {
        if (empty($articles)) {
            return 1;
        }
        $id = array_column($articles, 'id');
        return max($id) + 1;
    }
}