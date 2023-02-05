<?php
namespace App\Service\Book;

use App\DTO\Model\BookCategoryListResponse;

interface BookCategoryServiceInterface
{
    public function getCategories(): BookCategoryListResponse;
}
