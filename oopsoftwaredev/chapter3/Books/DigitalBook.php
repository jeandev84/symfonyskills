<?php
require_once 'Book.php';


class DigitalBook extends Book
{


    protected $fileSize;


    /**
     * @param string $title
     * @param int $fileSize
     */
    public function __construct(string $title, int $fileSize = 0)
    {
        parent::__construct($title);
        $this->fileSize = $fileSize;
    }



    /**
     * @return int
    */
    public function getFileSize(): int
    {
        return $this->fileSize;
    }
}