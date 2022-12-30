<?php
require_once 'Book.php';


class DigitalBook extends Book
{


    protected $fileSize;


    /**
     * @param string $title
     * @param string $author
     * @param int $price
     * @param int $fileSize
     */
    public function __construct(string $title, string $author, int $price, int $fileSize = 0)
    {
        parent::__construct($title, $author, $price);
        $this->fileSize = $fileSize;
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