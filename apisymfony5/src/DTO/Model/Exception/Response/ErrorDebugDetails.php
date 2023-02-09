<?php
namespace App\DTO\Model\Exception\Response;

class ErrorDebugDetails
{

     public function __construct(private string $trace)
     {
     }


     /**
      * @return string
     */
     public function getTrace(): string
     {
        return $this->trace;
     }
}
