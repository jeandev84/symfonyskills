<?php

define('YEAR', 2021);


class Calendar
{

    // Regular properties
    // Value should vary between objects
    public string $name;
    public array $seasons = ['Spring', 'Summer', 'Autum', 'Winter'];
    public float $weeksInYear = 365 / 7; // Can be written like this to aid understanding
    public int $year = YEAR;


    // Static properties
    // Value can change but remains same (static) for class and instances
    public static $daysInFebulary = 28;

    public static $count = 0;

    public function __construct()
    {
        self::$count++;
    }



    // Class constants
    // Fixed values associated with this class
    public const MONTHS_IN_YEAR = 12;


    public function getMonthsInYear()
    {
         return self::MONTHS_IN_YEAR;
    }

}


