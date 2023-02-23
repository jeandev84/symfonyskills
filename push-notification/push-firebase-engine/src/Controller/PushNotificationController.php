<?php
namespace App\Controller;

use App\Message\NotificationMessage;
use App\Service\PushNotificationService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;


class PushNotificationController extends AbstractController
{

      public function __construct(protected PushNotificationService $notificationService)
      {
      }

      #[Route('/push', name: 'push_xnotification')]
      public function sendMessage(Request $request): JsonResponse
      {
          $this->notificationService->notify(new NotificationMessage('Le contenu de notre message'));


          return $this->json(["message" => "Notification sent successfully"]);
      }
}