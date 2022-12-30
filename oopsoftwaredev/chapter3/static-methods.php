<?php

require_once 'Counter/Counter.php';
require_once 'Database/Connection.php';

$connection1 = new Connection();

print Connection::getCount() . PHP_EOL;

$connection2 = new Connection();

print Connection::getCount() . PHP_EOL;

print Connection::getCount() . PHP_EOL;


/*
Counter::$count++;
Counter::$count++;
Counter::$count++;
Counter::$count++;

print Counter::$count . PHP_EOL;
*/






