<?php
namespace App\Reservation\Decorator;

use App\Reservation\Contract\FlightReservation;

abstract class FlightReservationDecorator implements FlightReservation
{
      protected FlightReservation $flightReservation;

      public function __construct(FlightReservation $flightReservation)
      {
           $this->flightReservation = $flightReservation;
      }
}