<?php

require_once 'PhysicalBook.php';
require_once 'DigitalBook.php';


$physicalBook = new PhysicalBook('A Random Book', 'Jane Doe', 2000, 35);

print $physicalBook->getAuthor() . PHP_EOL;
print $physicalBook->print() . PHP_EOL;