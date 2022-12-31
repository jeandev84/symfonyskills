<?php

interface WeatherApiClientInterface
{
    public function getForecast($city);
}