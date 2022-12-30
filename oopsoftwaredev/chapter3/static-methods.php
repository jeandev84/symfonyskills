<?php

require_once 'Counter.php';
require_once 'Connection.php';


$connection1 = new Connection();

print Connection::getCountOfConnections() . PHP_EOL;

$connection2 = new Connection();

print Connection::getCountOfConnections() . PHP_EOL;

print Connection::getCountOfConnections() . PHP_EOL;


/*
Counter::$count++;
Counter::$count++;
Counter::$count++;
Counter::$count++;

print Counter::$count . PHP_EOL;
*/






