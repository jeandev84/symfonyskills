<?php

class PhysicalBook
{

    public $title;
    public $author;
    public $price;
    public $weight;


    /**
     * @param string $title
     * @param string $author
     * @param int $price
     * @param int $weight
    */
    public function __construct(
        string $title,
        string $author,
        int $price,
        int $weight = 0
    )
    {
        $this->title    = $title;
        $this->author   = $author;
        $this->price    = $price;
        $this->weight   = $weight;
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
    public function getWeight(): int
    {
        return $this->weight;
    }



    public function print(): string
    {
         return "{$this->title}, {$this->author}, weight: {$this->weight}";
    }

}