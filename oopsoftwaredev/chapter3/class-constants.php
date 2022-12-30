<?php

require_once 'Http.php';

/*
define('CREATED', 201);
print CREATED;

const CREATED = 201;

print CREATED . PHP_EOL;
*/


print HTTP::OK. PHP_EOL;
print HTTP::CREATED. PHP_EOL;
print HTTP::NOT_FOUND. PHP_EOL;