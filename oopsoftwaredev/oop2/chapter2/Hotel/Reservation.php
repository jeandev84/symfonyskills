<?php

class Reservation
{

      private $host  = 'Host class'; // Host class
      private $guest = 'Guest class'; // Guest class


      // Check whether cancellation is an option
      // Refund the guest...if refunds applicable [Guest]
      // Make the room available again [Room]
      // Notify the host [Host]
      // In app notification [Notification]
      // Send them an email / SMS (services: [Email, SMS])
      // Send confirmation to guest [Email, SMS]
      public function cancel()
      {
           $this->sendCancellationNotification();

           $this->refundGuest();

           echo "And a load of other stuff that you don't need to know that about";
      }



      private function sendCancellationNotification()
      {
           echo 'Sending notification to '. $this->host . '<br>';
      }



      private function refundGuest()
      {
          echo 'Refunding '. $this->guest . '<br>';
      }




}