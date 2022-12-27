<?php
namespace App\Reservation\Decorator\Concrete;

use App\Reservation\Decorator\FlightReservationDecorator;

class HoldLuggage extends FlightReservationDecorator
{

    private const PRICE = 60;


    public function calculatePrice()
    {
         return $this->flightReservation->calculatePrice() + self::PRICE;
    }
}