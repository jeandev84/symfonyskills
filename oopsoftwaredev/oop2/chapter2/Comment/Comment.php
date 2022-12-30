<?php

class Comment
{

      public $text;
      public $userId;



     /**
      * @param string $text
      * @param $userId
     */
     public function __construct(string $text, $userId)
     {
          $this->text   = $text;
          $this->userId = $userId;
     }
}