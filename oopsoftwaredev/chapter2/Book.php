<?php

class Book
{
       public $title;
       public $author;
       public $price;
       public $type;
       public $weight;
       public $fileSize;


       /**
        * @param string $title
        * @param string $author
        * @param int $price
        * @param string $type
        * @param int $weight
        * @param int $fileSize
      */
      public function __construct(
          string $title,
          string $author,
          int $price,
          string $type,
          int $weight = 0,
          int $fileSize = 0
      )
      {
           $this->title    = $title;
           $this->author   = $author;
           $this->price    = $price;
           $this->type     = $type;
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
       * @return string
      */
      public function getType(): string
      {
          return $this->type;
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



       public function print()
       {
            $string = "{$this->title}, {$this->author}, ";

            if ($this->type === 'physical') {
                $string .= "Weight: {$this->weight}";
            } elseif ($this->type === 'digital') {
                $string .= "Filesize: {$this->fileSize}";
            }

            return $string;
       }




      public function printBadWay()
      {
          // In this case we can create different objects of Books and define own print() method

          $string = "{$this->title}, {$this->author}, ";

          if ($this->type === 'physical') {
            $string .= "Weight: {$this->weight}";
          } elseif ($this->type === 'digital') {
            $string .= "Filesize: {$this->fileSize}";
          }

          return $string;
      }
}