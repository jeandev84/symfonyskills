<?php

require_once 'Books/Book.php';
require_once 'Books/PhysicalBook.php';


/*
$bookCanNotBeInstantiated = new Book();
print $bookCanNotBeInstantiated->getTitle() . PHP_EOL;

*/


$book = new PhysicalBook('Hamlet', 500);
print $book->getTitle() . PHP_EOL;