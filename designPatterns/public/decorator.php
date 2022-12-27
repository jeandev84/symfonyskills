<?php

require_once dirname(__DIR__, 1). '/vendor/autoload.php';


// SETUP
$reservation = new \App\Reservation\StandardFlightReservation();
$reservation = new \App\Reservation\Decorator\Concrete\ExtraLegroom($reservation);
$reservation = new \App\Reservation\Decorator\Concrete\HoldLuggage($reservation);


// DO SOMETHING
$totalCost = $reservation->calculatePrice(); // 400
