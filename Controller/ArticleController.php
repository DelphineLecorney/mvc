<?php

declare(strict_types = 1);

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
        // Prepare the database connection
        try {
            $bdd = new PDO('mysql:host=localhost;dbname=mvc;charset=utf8','root');  
        }
        catch(Exception $e) {
            die('Erreur : '.$e->getMessage());
        }

        $request = $bdd->query('SELECT * FROM articles');
        $rawArticles = $request->fetchAll(PDO::FETCH_ASSOC);

        // Note: you might want to use a re-usable databaseManager class - the choice is yours
        // TODO: fetch all articles as $rawArticles (as a simple array)

        $articles = [];
        foreach ($rawArticles as $rawArticle) {
            // We are converting an article from a "dumb" array to a much more flexible class
            $articles[] = new Article($rawArticle['title'], $rawArticle['description'], $rawArticle['publish_date']);
        }

        return $rawArticles;
    }

    public function show()
    {
        // TODO: this can be used for a detail page
        $articleId = $_GET['id'];
    }
}