<?php
namespace App\MessageHandler\Event;

use App\Message\Event\OrderSavedEvent;
use Mpdf\Mpdf;
use Mpdf\MpdfException;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Messenger\Handler\MessageHandlerInterface;
use Symfony\Component\Mime\Email;

class OrderSavedHandler implements MessageHandlerInterface
{

    public function __construct(private MailerInterface $mailer)
    {
    }


    /**
     * @param OrderSavedEvent $notification
     * @return void
     * @throws MpdfException
     * @throws TransportExceptionInterface
    */
    public function __invoke(OrderSavedEvent $event)
    {

        // Attempt to retrieve an order from MongoDB
        // throw new \RuntimeException('ORDER COULD NOT BE FOUND');

        // 1. Create a PDF contract note
        $mpdf = new Mpdf();
        $content = "<h1>Contact Note For Order {$event->getOrderId()}</h1>";
        $content .= "<p>Total: <b>$1898.75</b></p>";

        $mpdf->writeHtml($content);
        $contractNotePdf = $mpdf->output('', 'S');


        // 2. Email the contract note to the buyer
        $email = (new Email())
            ->from('sales@stocksapp.com')
            ->to('email@example.tech')
            ->subject('Contract note for order '. $event->getOrderId())
            ->text('Here is your contract note')
            ->attach($contractNotePdf, 'contract-note.pdf');


        $this->mailer->send($email);
    }
}