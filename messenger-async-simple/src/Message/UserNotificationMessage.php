<?php
namespace App\Message;

class UserNotificationMessage
{

     protected int $userId;

     public function __construct(int $userId)
     {
          $this->userId = $userId;
     }


     /**
      * @return int
     */
     public function getUserId(): int
     {
        return $this->userId;
     }
}