<?php

declare(strict_types=1);

class ArticleController
{
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
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root');
        } catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        $request = $bdd->query('SELECT * FROM articles');
        $rawArticles = $request->fetchAll();

        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article((int)$rawArticle['id'], $rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $articles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
        $articleId = $_GET['id'];

        try {
            $bdd = new PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root');
        } catch (Exception $e) {
            die('Erreur : ' . $e->getMessage());
        }
        $statement = $bdd->prepare('SELECT id, title, description, publish_date FROM articles WHERE id = :id');
        $statement->bindParam(':id', $articleId);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle) {
            die("The article wasn't found");
        }

        $article = new Article((int)$dataArticle['id'], $dataArticle['title'], $dataArticle['description'], $dataArticle['publish_date']);
        require 'View/articles/show.php';
    }
}