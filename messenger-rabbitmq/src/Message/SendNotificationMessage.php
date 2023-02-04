<?php
namespace App\Message;

class SendNotificationMessage
{
     private string $text;

     public function __construct(string $text)
     {
         $this->text = $text;
     }

     /**
      * @return string
     */
     public function getText(): string
     {
          return $this->text;
     }
}