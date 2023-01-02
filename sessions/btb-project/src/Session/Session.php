<?php
namespace App\Session;

class Session
{
     private bool $isStarted = false;


     public function isStarted(): bool
     {
          return $this->isStarted;
     }
}