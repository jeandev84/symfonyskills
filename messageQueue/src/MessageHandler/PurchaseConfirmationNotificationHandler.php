<?php
namespace App\MessageHandler;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;


#[AsMessageHandler]
class PurchaseConfirmationNotificationHandler /* implements MessageHandlerInterface */
{
     // AsMessageHandler the same thing to implements MessageHandlerinterface

     public function __invoke(PurchaseConfirmationNotification $notification)
     {
         // 1. Create a PDF contract note
         echo "Creating a PDF contract note ...<br>";

         // 2. Email the contract note to the buyer
         echo "Emailing contract note to" . $notification->getOrder()->getBuyer()->getEmail() . '<br>';
     }
}