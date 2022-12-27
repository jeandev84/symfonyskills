<?php
namespace App\Controller;

use App\Message\OrderConfirmationEmailMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;


class OrderController extends AbstractController
{

     /**
      * @Route("/placeorder", name="placeorder")
      * @param MessageBusInterface $bus
      * @return Response
     */
     public function placeOrder(MessageBusInterface $bus)
     {
          $bus->dispatch(new OrderConfirmationEmailMessage(1));

          return new Response('Your order has been placed');
     }
}