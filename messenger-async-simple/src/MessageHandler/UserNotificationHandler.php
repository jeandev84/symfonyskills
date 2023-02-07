<?php
namespace App\MessageHandler;

use App\Entity\User;
use App\Message\UserNotificationMessage;
use App\Service\UserNotifierService;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class UserNotificationHandler implements MessageHandlerInterface
{

     /**
      * @var EntityManagerInterface
     */
     protected EntityManagerInterface $entityManager;


     /**
      * @var UserNotifierService
     */
     protected UserNotifierService $notifierService;



     /**
      * @param EntityManagerInterface $entityManager
      * @param UserNotifierService $notifierService
     */
     public function __construct(EntityManagerInterface $entityManager, UserNotifierService $notifierService)
     {
          $this->entityManager = $entityManager;
          $this->notifierService = $notifierService;
     }


     /**
      * @param UserNotificationMessage $message
      * @return void
      * @throws LoaderError
      * @throws RuntimeError
      * @throws SyntaxError
      * @throws TransportExceptionInterface
     */
     public function __invoke(UserNotificationMessage $message)
     {
           $user = $this->entityManager->find(User::class, $message->getUserId());

            if ($user !== null) {
              $this->notifierService->notify($user);
            }
     }
}