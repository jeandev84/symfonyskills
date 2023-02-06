<?php
namespace App\Service\Book\Category;

use App\DTO\Model\Book\Category\BookCategoryListResponse;

interface BookCategoryServiceInterface
{
    public function getCategories(): BookCategoryListResponse;
}
