<?php
namespace App\MessageHandler\Command;

use App\Message\Command\SaveOrder;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;

##[AsMessageHandler]
class SaveOrderHandler implements MessageHandlerInterface
{

       /**
        * @param SaveOrder $order
        * @return void
       */
       public function __invoke(SaveOrder $order)
       {
           // Save an order to the database

           $orderId = 123;

           echo 'Order being saved'. PHP_EOL;


           // Dispatch an event message on a event bus


       }
}