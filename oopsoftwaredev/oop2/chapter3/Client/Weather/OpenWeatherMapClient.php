<?php
require_once __DIR__.'/Contract/WeatherApiClientInterface.php';

class OpenWeatherMapClient implements WeatherApiClientInterface
{

    public function getForecast($city)
    {
         // Call Open Weather Map api using city parameter
         // ...


         // Return some kind of response
         return 'It is raining in '. $city;
    }
}