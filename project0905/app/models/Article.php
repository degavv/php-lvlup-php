<?php

namespace app\models;

class Article
{
    protected $articles = [];
    public function __construct()
    {
        $this->readArticles();
    }
    /**
     * Reads articles from a file and returns them as a list
     * @return void
     */
    protected function readArticles(): void
    {
        if (file_exists(ARTICLES_FILE)) {
            $articlesJson = file_get_contents(ARTICLES_FILE);
            $articles = json_decode($articlesJson, true);
            if ($articles) {
                $this->articles = $articles;
            }
        }
    }

    /**
     * Saves articles to the JSON file
     * @return void
     */
    protected function saveArticles(): void
    {
        $articlesJson = json_encode($this->articles);
        file_put_contents(ARTICLES_FILE, $articlesJson);
    }
    /**
     * returns all articles
     * @return mixed
     */
    public function all(): mixed
    {
        $sorted = $this->articles;

        uasort($sorted, function ($a, $b) {
            return $b['date'] <=> $a['date'];
        });

        return $sorted;
    }
    /**
     * adds articles to the array and saves them to a file
     * @param string $article
     * @return void
     */
    public function add(string $title, string $content): void
    {
        $date = time();
        $article = [
            'title' => $title,
            'content' => $content,
            'date' => $date,

        ];
        $this->articles[] = $article;
        $this->saveArticles();
    }
    /**
     * deletes articles from the array and saves them to a file
     * @param int $id
     * @return void
     */
    public function delete(int $id): void
    {
        array_splice($this->articles, $id, 1);
        $this->saveArticles();
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
        $this->articles[$id] = $article;
        $this->saveArticles();
    }
    /**
     * returns article by id
     * @param int $id
     * @return string
     */
    public function find(int $id): ?array
    {
        return $this->articles[$id] ?? null;
    }

    public function comment(int $id, string $name, string $comment): void
    {
        $this->articles[$id]['comments'] = ['name' => $name, 'comment' => $comment];
    }
}