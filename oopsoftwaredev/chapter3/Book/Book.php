<?php

class Book
{
       protected $title;

       /**
        * @param string $title
      */
      public function __construct(string $title)
      {
           $this->title    = $title;
      }




      /**
       * @return string
      */
      public function getTitle(): string
      {
           return $this->title;
      }

}