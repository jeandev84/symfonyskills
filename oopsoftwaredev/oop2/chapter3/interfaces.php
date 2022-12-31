<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Weather (Interfaces)</title>
</head>
<body>

<?php

     require 'Client/Weather/DarkSkyApiClient.php';
     require 'Client/Weather/OpenWeatherMapClient.php';

     # $weatherApiClient = new DarkSkyApiClient();
     $weatherApiClient = new OpenWeatherMapClient();
     $forecast = $weatherApiClient->getForecast('New York');
?>

<h1>Weather App</h1>
<p><?= $forecast ?></p>
</body>
</html>