<?php

require_once 'Counter.php';
require_once 'Connection.php';

/*
$count accessible only if visibility of $count is public

$connection1 = new Connection();

print Connection::$count . PHP_EOL;

$connection2 = new Connection();

print Connection::$count . PHP_EOL;
*/


/*
Counter::$count++;
Counter::$count++;
Counter::$count++;
Counter::$count++;

print Counter::$count . PHP_EOL;
*/