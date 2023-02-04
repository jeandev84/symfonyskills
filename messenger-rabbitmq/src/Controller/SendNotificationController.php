<?php
namespace App\Controller;

use App\Message\SendNotificationMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;


class SendNotificationController extends AbstractController
{


      #[Route('/send-message', name: 'send-message')]
      public function sendMessage(MessageBusInterface $bus): Response
      {
           $bus->dispatch(new SendNotificationMessage('Hello world!'));

           return new Response(null, Response::HTTP_NO_CONTENT);
      }
}