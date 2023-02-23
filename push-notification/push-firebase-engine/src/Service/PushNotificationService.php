<?php
namespace App\Service;

use App\Message\NotificationMessage;
use Symfony\Component\Notifier\Bridge\Firebase\Notification\WebNotification;
use Symfony\Component\Notifier\ChatterInterface;
use Symfony\Component\Notifier\Exception\TransportExceptionInterface;
use Symfony\Component\Notifier\Message\ChatMessage;

class PushNotificationService
{

      const TRANSPORT = 'firebase';


      public function __construct(protected ChatterInterface $chatter)
      {
      }


     /**
      * @throws TransportExceptionInterface
     */
     public function notify(NotificationMessage $message): void
      {
           $tokenClient = $message->getTokenClient();
           $options = ['title' => 'Titre Push Notification'];


           $chatMessage = new ChatMessage(
               $message->getContent(),
               new WebNotification(
                   $tokenClient,
                   $options
               ), // Ici on met le token qu'on a generer partie frontend
           );


           $firebaseMessage = $chatMessage->transport('firebase');
           $this->chatter->send($firebaseMessage);
      }
}