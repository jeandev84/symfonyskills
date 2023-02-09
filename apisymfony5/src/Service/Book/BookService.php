<?php

namespace App\Service\Book;

use App\DTO\Model\Book\BookListItem;
use App\DTO\Model\Book\BookListResponse;
use App\Entity\Book\Book;
use App\Exception\Book\Category\BookCategoryNotFoundException;
use App\Repository\Book\BookCategoryRepository;
use App\Repository\Book\BookRepository;

class BookService
{
    public function __construct(protected BookRepository $bookRepository, protected BookCategoryRepository $bookCategoryRepository)
    {
    }

    public function getBooksByCategory(int $categoryId): BookListResponse
    {
        if (!$this->bookCategoryRepository->existsById($categoryId)) {
            throw new BookCategoryNotFoundException();
        }

        return new BookListResponse(
            array_map([$this, 'map'],
                $this->bookRepository->findBooksByCategoryId($categoryId))
        );
    }

    public function map(Book $book): BookListItem
    {
        return (new BookListItem())
                   ->setId($book->getId())
                   ->setTitle($book->getTitle())
                   ->setSlug($book->getSlug())
                   ->setImage($book->getImage())
                   ->setAuthors($book->getAuthors())
                   ->setMeap($book->isMeap())
                   ->setPublicationDate($book->getPublicationDate()->getTimestamp());
    }
}
