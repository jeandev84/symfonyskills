<?php
namespace App\MessageHandler\Command\Sms;

use App\Message\Command\Sms\SignupSms;

class SignupSmsHandler
{

     public function __invoke(SignupSms $signupSms)
     {
         // connect to api of external sms service provider
         sleep(2);

         var_dump($signupSms);
     }
}