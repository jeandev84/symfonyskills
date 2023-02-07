<?php
namespace App\Service;

use Symfony\Component\Messenger\MessageBusInterface;

class AsyncMethodService
{

     /**
      * @var MessageBusInterface
     */
     protected MessageBusInterface $messageBus;


     public function __construct(MessageBusInterface $messageBus)
     {
     }
}