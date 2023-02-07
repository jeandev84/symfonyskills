<?php
namespace App\Service;

use App\Message\ServiceMethodCallMessage;
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


     /**
      * @param string $serviceName
      * @param string $methodName
      * @param array $params
      * @return void
     */
     public function async(string $serviceName, string $methodName, array $params = [])
     {
           $this->messageBus->dispatch(new ServiceMethodCallMessage($serviceName, $methodName, $params));
     }
}