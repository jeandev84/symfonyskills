<?php

require_once 'Book.php';


$physicalBook = new Book('A Random Book', 'Jane Doe', 2000, 'physical');
$digitalBook  = new Book('A Random Book', 'Jane Doe', 2000, 'digital');


/*
print $physicalBook->getFileSize() . PHP_EOL;
print $digitalBook->getAuthor() . PHP_EOL;
*/

print $physicalBook->print() . PHP_EOL;
print $digitalBook->print()  . PHP_EOL;