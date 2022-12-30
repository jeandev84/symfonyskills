<?php

class DigitalBook
{

    public $title;
    public $author;
    public $price;
    public $fileSize;


    /**
     * @param string $title
     * @param string $author
     * @param int $price
     * @param int $fileSize
     */
    public function __construct(
        string $title,
        string $author,
        int $price,
        int $fileSize = 0
    )
    {
        $this->title    = $title;
        $this->author   = $author;
        $this->price    = $price;
        $this->fileSize = $fileSize;
    }




    /**
     * @return string
     */
    public function getTitle(): string
    {
        return $this->title;
    }


    /**
     * @return string
    */
    public function getAuthor(): string
    {
        return $this->author;
    }



    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }



    /**
     * @return int
    */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }



    public function print(): string
    {
        return "{$this->title}, {$this->author}, filesize: {$this->fileSize}";
    }
}