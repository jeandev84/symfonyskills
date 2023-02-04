<?php
namespace App\Handler;

use App\Message\SendNotificationMessage;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Messenger\MessageBusInterface;


//#[AsMessageHandler]
class SendNotificationHandler implements MessageHandlerInterface
{

     protected MessageBusInterface $bus;

     public function __construct(MessageBusInterface $bus)
     {
         $this->bus = $bus;
     }



     public function __invoke(SendNotificationMessage $message)
     {
         // here we need to do some work
         // let's delay the program execution
         sleep(5);


         $this->bus->dispatch(new SendNotificationMessage('Hello from Handler'));
     }
}