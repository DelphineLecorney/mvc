<?php

declare(strict_types=1);

class Article
{
    public int $id;
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public function __construct(int $id, string $title, ?string $description, ?string $publishDate)
    {
        $this->id = $id;
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    public function formatPublishDate($format = 'D-M-Y')
    {
        // TODO: return the date in the required format
        $date = $this->publishDate;

        $dateTime = new DateTime($date);

        $dateFormat = $dateTime->format($format);

        return $dateFormat;
    }
}