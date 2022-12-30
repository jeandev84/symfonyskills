<?php

class Book
{
       protected $title;
       protected $author;
       protected $price;


       /**
        * @param string $title
        * @param string $author
        * @param int $price
      */
      public function __construct(string $title, string $author, int $price)
      {
           $this->title    = $title;
           $this->author   = $author;
           $this->price    = $price;
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


      public function getPriceAsCurrency(): string
      {
          return "$". $this->price / 100;
      }



      public function print(): string
      {
          return "{$this->title}, {$this->author}";
      }

}