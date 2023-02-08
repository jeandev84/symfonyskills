<?php
namespace App\DTO\Model\Exception\Response;

class ErrorResponse
{
    public function __construct(protected string $message)
    {
    }


     /**
      * @return string
     */
     public function getMessage(): string
     {
         return $this->message;
     }
}
