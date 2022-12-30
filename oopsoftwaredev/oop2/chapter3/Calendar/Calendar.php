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


$calendar = new Calendar();
$calendar->name = 'Year Planner';

$calendar2 = new Calendar();
print Calendar::$count;

print $calendar->name . PHP_EOL;
print $calendar->getMonthsInYear() . PHP_EOL;
print Calendar::MONTHS_IN_YEAR;


print Calendar::$daysInFebulary . PHP_EOL;
Calendar::$daysInFebulary++;
print $calendar::$daysInFebulary . PHP_EOL;


print_r($calendar->seasons);
print_r($calendar->weeksInYear);
print $calendar->year. PHP_EOL;