<?php
namespace App\MessageHandler;

use App\Message\PurchaseConfirmationNotification;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Attribute\AsMessageHandler;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;


#[AsMessageHandler]
class PurchaseConfirmationNotificationHandler /* implements MessageHandlerInterface */
{
     // AsMessageHandler the same thing to implements MessageHandlerinterface


    public function __construct(private MailerInterface $mailer)
    {
    }

    public function __invoke(PurchaseConfirmationNotification $notification)
     {
         // 1. Create a PDF contract note
         echo "Creating a PDF contract note ...<br>";

         // 2. Email the contract note to the buyer
         $email = (new Email())
                  ->from('sales@stocksapp.com')
                  ->to($notification->getOrder()->getBuyer()->getEmail())
                  ->subject('Contract note for order '. $notification->getOrder()->getId())
                  ->text('Here is your contract note')
                  //->attach()
         ;


         $this->mailer->send($email);
     }
}