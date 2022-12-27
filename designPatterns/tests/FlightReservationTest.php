<?php

class FlightReservationTest extends \PHPUnit\Framework\TestCase
{

      /** @test */
      public function a_flight_reservation_can_be_decorated()
      {

            // SETUP
            $reservation = new \App\Reservation\StandardFlightReservation();
            $reservation = new \App\Reservation\Decorator\Concrete\ExtraLegroom($reservation);
            $reservation = new \App\Reservation\Decorator\Concrete\HoldLuggage($reservation);


            // DO SOMETHING
            $totalCost = $reservation->calculatePrice();


            // MAKE ASSERTIONS
             $this->assertEquals(400, $totalCost);
      }
}