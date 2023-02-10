<?php

namespace App\Service\Book;

use App\DTO\Model\Book\BookDetails;
use App\DTO\Model\Book\BookFormat;
use App\DTO\Model\Book\BookListItem;
use App\DTO\Model\Book\BookListResponse;
use App\DTO\Model\Book\Category\BookCategory as BookCategoryModel;
use App\Entity\Book\Book;
use App\Entity\Book\BookCategory;
use App\Entity\Book\BookToBookFormat;
use App\Exception\Book\Category\BookCategoryNotFoundException;
use App\Repository\Book\BookCategoryRepository;
use App\Repository\Book\BookRepository;
use App\Repository\Reviews\ReviewRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;

class BookService
{
    public function __construct(
        protected BookRepository $bookRepository,
        protected BookCategoryRepository $bookCategoryRepository,
        protected ReviewRepository $reviewRepository
    ) {
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

    /**
     * @throws NonUniqueResultException
     * @throws NoResultException
     */
    public function getBookById(int $id): BookDetails
    {
        $book = $this->bookRepository->getById($id);
        $reviews = $this->reviewRepository->countByBookId($id);
        $ratingSum = $this->reviewRepository->getBookTotalRatingSum($id);

        $categories = $book->getCategories()->map(fn (BookCategory $bookCategory) => new BookCategoryModel(
            $bookCategory->getId(), $bookCategory->getTitle(), $bookCategory->getSlug()
        ));

        return (new BookDetails())
               ->setId($book->getId())
               ->setTitle($book->getTitle())
               ->setSlug($book->getSlug())
               ->setImage($book->getImage())
               ->setAuthors($book->getAuthors())
               ->setMeap($book->isMeap())
               ->setPublicationDate($book->getPublicationDate()->getTimestamp())
               ->setRating($ratingSum / $reviews)
               ->setReviews($reviews)
               ->setFormats($this->mapFormats($book->getFormats()))
              ->setCategories($categories->toArray());
    }

    /**
     * @param Collection<BookToBookFormat> $formats
     */
    private function mapFormats(Collection $formats): array
    {
        return $formats->map(fn (BookToBookFormat $formatJoin) => (new BookFormat())
                       ->setId($formatJoin->getFormat()->getId())
                       ->setTitle($formatJoin->getFormat()->getTitle())
                       ->setDescription($formatJoin->getFormat()->getDescription())
                       ->setComment($formatJoin->getFormat()->getComment())
                       ->setPrice($formatJoin->getPrice())
                       ->setDiscountPercent($formatJoin->getDiscountPercent())
                  );
    }

    private function map(Book $book): BookListItem
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
