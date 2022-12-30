<?php

class Book
{
       public $title;
       public $author;
       public $price;
       public $weight;
       public $fileSize;


       /**
        * @param string $title
        * @param string $author
        * @param int $price
        * @param int $weight
        * @param int $fileSize
      */
      public function __construct(
          string $title,
          string $author,
          int $price,
          int $weight = 0,
          int $fileSize = 0
      )
      {
           $this->title    = $title;
           $this->author   = $author;
           $this->price    = $price;
           $this->weight   = $weight;
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
      public function getWeight(): int
      {
           return $this->weight;
      }


      /**
       * @return int
      */
      public function getFileSize(): int
      {
           return $this->fileSize;
       }
}