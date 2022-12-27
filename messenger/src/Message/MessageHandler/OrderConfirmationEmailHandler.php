<?php
namespace App\Message\MessageHandler;

use App\Message\OrderConfirmationEmailMessage;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

class OrderConfirmationEmailHandler implements MessageHandlerInterface
{

     /**
      * @param OrderConfirmationEmailMessage $orderConfirmationEmail
      * @return void
     */
     public function __invoke(OrderConfirmationEmailMessage $orderConfirmationEmail)
     {
          // Query Order / customer details the DB

          // Create email from template
          echo 'Sending email now ...';


          // Send email
          sleep(5);

          // ... other stuff with takes a while
     }
}