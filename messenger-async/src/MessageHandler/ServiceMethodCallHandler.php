<?php
namespace App\MessageHandler;

use App\Message\ServiceMethodCallMessage;
use App\Service\UserNotifierService;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\ContainerInterface;
use Psr\Container\NotFoundExceptionInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Contracts\Service\ServiceSubscriberInterface;

class ServiceMethodCallHandler implements MessageHandlerInterface, ServiceSubscriberInterface
{

    protected ContainerInterface $container;


    public function __construct(ContainerInterface $container)
    {
         $this->container = $container;
    }



    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
    */
    public function __invoke(ServiceMethodCallMessage $message)
    {
          $callable = [
            $this->container->get($message->getServiceName()),
            $message->getMethodName()
          ];

          call_user_func_array($callable, $message->getParams());
    }


    /**
     * Permet de recuperer les services meme s'ils sont privees
     *
     * @return
     */
    public static function getSubscribedServices()
    {
        return [
           UserNotifierService::class => UserNotifierService::class
        ];
    }
}