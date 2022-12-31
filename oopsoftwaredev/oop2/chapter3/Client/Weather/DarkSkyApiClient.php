<?php

require_once __DIR__.'/Contract/WeatherApiClientInterface.php';


class DarkSkyApiClient implements WeatherApiClientInterface
{

    public function getForecast($city)
    {
        // Call lat and long of city


        // Call Dark Sky API using lat / long


        // Return some kind of response
        return 'It is raining in '. $city;
    }
}