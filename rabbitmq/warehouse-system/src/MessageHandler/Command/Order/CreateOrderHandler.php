<?php
namespace App\MessageHandler\Command\Order;

use App\Message\Command\Order\CreateOrder;


class CreateOrderHandler
{

     public function __invoke(CreateOrder $createOrder)
     {
          // send email to client confirming the order (product name, amount, price, etc.)

          // update warehouse database to keep stock up to date in physical stores
          sleep(4);

          var_dump($createOrder);
     }
}