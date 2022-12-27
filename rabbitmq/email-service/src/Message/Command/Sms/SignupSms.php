<?php
namespace App\Message\Command\Sms;

class SignupSms
{

      protected $phoneNumber;


      public function __construct(string $phoneNumber)
      {
           $this->phoneNumber = $phoneNumber;
      }


     /**
      * @return string
     */
     public function getPhoneNumber(): string
     {
        return $this->phoneNumber;
     }
}