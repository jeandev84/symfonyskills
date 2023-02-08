<?php
namespace App\Exception\Book;

use RuntimeException;

class BookCategoryNotFoundException extends RuntimeException
{
    public function __construct()
    {
        parent::__construct('Book category not found');
    }
}
