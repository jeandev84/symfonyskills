<?php
namespace App\Session;

class Session
{
     private bool $isStarted = false;


     public function isStarted(): bool
     {
          return $this->isStarted;
     }



     public function start(): bool
     {
         if ($this->isStarted) {
             return true;
         }

         if (session_status() === PHP_SESSION_ACTIVE) {
             return $this->isStarted = true;
         }

         session_start();
         return $this->isStarted = true;
     }
}