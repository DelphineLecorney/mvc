<?php

declare(strict_types=1);

require_once 'Model/connect.php';

class ArticleController
{
    private $bdd;

    public function __construct()
    {
        $this->bdd = getConnectBdd();
    }

    public function index()
    {
        // Load all required data
        $articles = $this->getArticles();

        // Load the view
        require 'View/articles/index.php';
    }

    // Note: this function can also be used in a repository - the choice is yours
    private function getArticles()
    {
        $request = $this->bdd->query('SELECT * FROM articles');
        $rawArticles = $request->fetchAll();

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article(
                $rawArticle['id'],
                $rawArticle['title'],
                $rawArticle['description'],
                $rawArticle['publish_date'],
                $rawArticle['image_url'] ?? '',
                $rawArticle['author']
            );

        }

        return $articles;
    }

    public function getUrl()
    {
        $url = 'http://localhost/Becode/mvc/index.php?page=articles-show&id=' . $this->id;
        return $url;
    }

    public function show()
    {
        $articleId = $_GET['id'];

        $statement = $this->bdd->prepare('SELECT id, title, description, publish_date, image_url, author 
                                            FROM articles 
                                            WHERE id = :id');
        $statement->bindParam(':id', $articleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            die("The article wasn't found");
        }

        $article = new Article(
            $dataArticle['id'],
            $dataArticle['title'],
            $dataArticle['description'],
            $dataArticle['publish_date'],
            $dataArticle['image_url'] ?? '',
            $dataArticle['author']
        );

        $previousArticle = $this->getPreviousArticle();

        $nextArticle = $this->getNextArticle();

        require 'View/articles/show.php';
    }

    public function retrieveCurrentArticle()
    {
        $articleId = $_GET['id'];
        $statement = $this->bdd->prepare('SELECT id, title, description, publish_date, image_url, author
                                            FROM articles 
                                            WHERE id = :id');
        $statement->bindParam(':id', $articleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            return null;
        }
        return new Article(
            $dataArticle['id'],
            $dataArticle['title'],
            $dataArticle['description'],
            $dataArticle['publish_date'],
            $dataArticle['image_url'] ?? '',
            $dataArticle['author']
        );
    }

    public function getPreviousArticle()
    {
        $currentArticleId = $_GET['id'];

        $statement = $this->bdd->prepare('SELECT id, title, description, publish_date, image_url, author 
                                            FROM articles 
                                            WHERE id < :id 
                                            ORDER BY id 
                                            DESC LIMIT 1');

        $statement->bindParam(':id', $currentArticleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            return null;
        }
        return new Article(
            $dataArticle['id'],
            $dataArticle['title'],
            $dataArticle['description'],
            $dataArticle['publish_date'],
            $dataArticle['image_url'] ?? '',
            $dataArticle['author']
        );
    }

    public function getNextArticle()
    {
        $currentArticleId = $_GET['id'];

        $statement = $this->bdd->prepare('SELECT id, title, description, publish_date, image_url, author
                                            FROM articles 
                                            WHERE id > :id 
                                            ORDER BY id 
                                            ASC LIMIT 1');

        $statement->bindParam(':id', $currentArticleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            return null;
        }
        return new Article(
            $dataArticle['id'],
            $dataArticle['title'],
            $dataArticle['description'],
            $dataArticle['publish_date'],
            $dataArticle['image_url'] ?? '',
            $dataArticle['author']
        );
    }

}
