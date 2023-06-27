<?php

declare(strict_types=1);

class Article
{
    public string $title;
    public ?string $description;
    public ?string $publishDate;

    public function __construct(string $title, ?string $description, ?string $publishDate)
    {
        $this->title = $title;
        $this->description = $description;
        $this->publishDate = $publishDate;
    }

    public function formatPublishDate($format = 'DD-MM-YYYY')
    {
        // TODO: return the date in the required format
        $date = $this->publishDate;

        $format = str_replace('DD', 'd', $format);
        $format = str_replace('MM', 'm', $format);
        $format = str_replace('YYYY', 'Y', $format);

        $dateFormat = date($format, strtotime($date));

        return $dateFormat;
    }
}