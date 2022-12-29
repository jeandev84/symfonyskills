<?php
namespace App\Message;

class PurchaseConfirmationNotification
{

      public function __construct(private int|string $orderId)
      {
      }


      /**
       * @return int|string
      */
      public function getOrderId(): int|string
      {
           return $this->orderId;
      }
}