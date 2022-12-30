<?php

require_once 'Book.php';


$physicalBook = new Book('A Random Book', 'Jane Doe', 2000);
$digitalBook  = new Book('A Random Book', 'Jane Doe', 2000);


print $physicalBook->getFileSize() . PHP_EOL;
print $digitalBook->getAuthor() . PHP_EOL;