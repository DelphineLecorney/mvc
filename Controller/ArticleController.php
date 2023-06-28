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
            $articles[] = new Article((int)$rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        $articleId = $_GET['id'];

        $statement = $this->bdd->prepare('SELECT id, title, description, publish_date FROM articles WHERE id = :id');
        $statement->bindParam(':id', $articleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            die("The article wasn't found");
        }

        $article = new Article((int)$dataArticle['id'], $dataArticle['title'], $dataArticle['description'], $dataArticle['publish_date']);

        $previousArticle = $this->getPreviousArticle();

        $nextArticle = $this->getNextArticle();

        require 'View/articles/show.php';
    }

    public function retrieveCurrentArticle()
    {
        $statement = $this->bdd->prepare('SELECT id, title, description, publish_date FROM articles WHERE id = :id');
        $statement->bindParam(':id', $articleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            return null;
        }
        return new Article((int)$dataArticle['id'], $dataArticle['title'], $dataArticle['description'], $dataArticle['publish_date']);
    }

}