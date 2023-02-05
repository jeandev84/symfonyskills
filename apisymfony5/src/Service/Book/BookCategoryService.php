<?php
namespace App\Service\Book;

use App\DTO\Model\BookCategoryListItem;
use App\DTO\Model\BookCategoryListResponse;
use App\Entity\Book\BookCategory;
use App\Repository\Book\BookCategoryRepository;
use Doctrine\Common\Collections\Criteria;


class BookCategoryService implements BookCategoryServiceInterface
{
     public function __construct(protected BookCategoryRepository $bookCategoryRepository)
     {
     }


     public function getCategories(): BookCategoryListResponse
     {
          # Get all categories and sort by title "direction: ASC"
          $categories = $this->bookCategoryRepository->findBy([], ['title' => Criteria::ASC]);

          $items = array_map(
              fn(BookCategory $bookCategory) => new BookCategoryListItem(
                  $bookCategory->getId(), $bookCategory->getTitle(), $bookCategory->getSlug()
              ),
              $categories
          );


          return new BookCategoryListResponse($items);
     }
}