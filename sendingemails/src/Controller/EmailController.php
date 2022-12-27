<?php
namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Symfony\Component\Routing\Annotation\Route;


class EmailController extends AbstractController
{

      /**
       * @Route("/email")
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