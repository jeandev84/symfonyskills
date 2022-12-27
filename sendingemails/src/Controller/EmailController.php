<?php
namespace App\Controller;

use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Address;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class EmailController extends AbstractController
{

       /**
        * @Route("/email")
        * @param MailerInterface $mailer
        * @param $appEmail
        * @param $publicDir
        * @return Response
        * @throws TransportExceptionInterface
      */
      public function sendTemplateEmail(MailerInterface $mailer, $appEmail, $publicDir): Response
      {
           $email = (new TemplatedEmail())
                    ->from($appEmail)
                    ->to(new Address('email@example.com', 'Gary'))
                    ->subject('You order has been placed')
                    ->textTemplate('emails/order-confirmation.txt.twig')
                    ->htmlTemplate('emails/order-confirmation.html.twig')
                    ->attachFromPath($publicDir . '/pdf/example-invoice.pdf')
                    ->context([
                        'delivery_date' => date_create('+3 days'),
                        'order_number'  => rand(5, 50000)
                    ])
           ;

           $mailer->send($email);

           return new Response('Email sent');
      }



      /**
       * @Route("/send-email")
       * @param MailerInterface $mailer
       * @return Response
       * @throws TransportExceptionInterface
      */
      public function sendEmail(MailerInterface $mailer)
      {
          $email = (new Email())
              ->from('sale@app.com')
              ->to('email@example.com')
              ->subject('You order has been placed')
              ->html('<p>Thank you, your order has been placed</p>');

          $mailer->send($email);

          return new Response('Email sent');
    }
}