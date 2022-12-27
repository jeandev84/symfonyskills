<?php
namespace App\Reservation\Decorator\Concrete;

use App\Reservation\Decorator\FlightReservationDecorator;


class ExtraLegroom extends FlightReservationDecorator
{

    private const PRICE = 40;


    /**
     * @return int
    */
    public function calculatePrice(): int
    {
         return $this->flightReservation->calculatePrice() + self::PRICE;
    }
}