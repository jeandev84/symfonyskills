<?php


require_once 'Calendar/Calendar.php';


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