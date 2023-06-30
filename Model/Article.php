<?php

declare(strict_types=1);

class Article
{
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;
    public string $imageUrl;
    public string $author;
    private $bdd;

    public function __construct(int $id, string $title, ?string $description, ?string $publishDate, string $imageUrl, string $author)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
        $this->imageUrl = $imageUrl ?? '';
        $this->author = $author;
        $this->bdd = getConnectBdd();
    }

    public function formatPublishDate($format = 'D-M-Y')
    {
        $date = $this->publishDate;

        $dateTime = new DateTime($date);

        $dateFormat = $dateTime->format($format);

        return $dateFormat;
    }
    public function getId()
    {
        return $this->id;
    }

    public function getTitle()
    {
        return $this->title;
    }

    public function getImage()
    {
        $statement = $this->bdd->prepare('SELECT image_url 
                                      FROM articles 
                                      WHERE id = :id');
        $statement->bindParam(':id', $this->id);
        $statement->execute();

        $dataArticle = $statement->fetch(PDO::FETCH_ASSOC);

        if (!$dataArticle || empty($dataArticle['image_url'])) {
            die("The image wasn't found");
        }

        return $dataArticle['image_url'];
    }

    public function getAuthor()
    {
        if(!$this->author) {
            die("There's no author");
        } else {
            return $this->title.' By - '.$this->author;
        }
    }

    public function getUrl()
    {
        $url = 'index.php?page=articles-show&id=' . urlencode($this->id);
    
        return $url;
    }
    
    
}
