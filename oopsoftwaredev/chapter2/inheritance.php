<?php

require_once 'PhysicalBook.php';
require_once 'DigitalBook.php';

$book = new Book('A Random Book', 'Jane Doe', 2000);
print $book->print() . PHP_EOL;


$physicalBook = new PhysicalBook('A Random Book', 'Jane Doe', 2000, 300);
print $physicalBook->print() . PHP_EOL;