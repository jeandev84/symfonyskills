<?php
namespace App\MessageHandler\Command;

use App\Message\Command\SaveOrder;
use App\Message\Event\OrderSavedEvent;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;

##[AsMessageHandler]
class SaveOrderHandler implements MessageHandlerInterface
{


       public function __construct(private MessageBusInterface $eventBus)
       {
       }




       /**
        * @param SaveOrder $saveOrder
        * @return void
       */
       public function __invoke(SaveOrder $saveOrder)
       {
           // Save an order to the database

           $orderId = 123;

           echo 'Order being saved'. PHP_EOL;


           // Dispatch an event message on a event bus
           $this->eventBus->dispatch(new OrderSavedEvent($orderId));
       }
}