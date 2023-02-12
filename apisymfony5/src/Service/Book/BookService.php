<?php

namespace App\Service\Book;

use App\DTO\Model\Book\BookDetails;
use App\DTO\Model\Book\BookFormat;
use App\DTO\Model\Book\BookListResponse;
use App\DTO\Model\Book\Category\BookCategory as BookCategoryModel;
use App\Entity\Book\Book;
use App\Entity\Book\BookCategory;
use App\Entity\Book\BookToBookFormat;
use App\Exception\Book\Category\BookCategoryNotFoundException;
use App\Mapper\Book\BookMapper;
use App\Repository\Book\BookCategoryRepository;
use App\Repository\Book\BookRepository;
use App\Repository\Reviews\ReviewRepository;
use App\Service\Recommendation\Exception\AccessDeniedException;
use App\Service\Recommendation\Exception\RequestException;
use App\Service\Recommendation\Model\RecommendationItem;
use App\Service\Recommendation\RecommendationService;
use App\Service\Reviews\RatingService;
use Doctrine\Common\Collections\Collection;
use Exception;
use Psr\Log\LoggerInterface;

class BookService
{
    public function __construct(
        protected BookRepository $bookRepository,
        protected BookCategoryRepository $bookCategoryRepository,
        protected ReviewRepository $reviewRepository,
        protected RatingService $ratingService,
        protected RecommendationService $recommendationService,
        protected LoggerInterface $logger
    ) {
    }

    public function getBooksByCategory(int $categoryId): BookListResponse
    {
        if (!$this->bookCategoryRepository->existsById($categoryId)) {
            throw new BookCategoryNotFoundException();
        }

        return new BookListResponse(array_map(
            fn (Book $book) => BookMapper::map($book, new BookDetails()),
            $this->bookRepository->findBooksByCategoryId($categoryId)
        ));
    }

    public function getBookById(int $id): BookDetails
    {
        $book = $this->bookRepository->getById($id);
        $reviews = $this->reviewRepository->countByBookId($id);
        $recommendations = [];

        $categories = $book->getCategories()->map(fn (BookCategory $bookCategory) => new BookCategoryModel(
            $bookCategory->getId(), $bookCategory->getTitle(), $bookCategory->getSlug()
        ));

        try {
            $recommendations = $this->getRecommendations($id);
        } catch (Exception $exception) {
            $this->logger->error('error while fetching recommendations', [
                'exception' => $exception->getMessage(),
                'bookId' => $id,
            ]);
        }

        return BookMapper::map($book, new BookDetails())
                      ->setRating($this->ratingService->calculateReviewRatingForBook($id, $reviews))
                      ->setReviews($reviews)
                      ->setRecommendations($recommendations)
                      ->setFormats($this->mapFormats($book->getFormats()))
                      ->setCategories($categories->toArray());
    }

    /**
     * @throws RequestException
     * @throws AccessDeniedException
     */
    public function getRecommendations(int $bookId): array
    {
        $ids = array_map(
            fn (RecommendationItem $item) => $item->getId(),
            $this->recommendationService->getRecommendationsByBookId($bookId)->getRecommendations()
        );

        return array_map([BookMapper::class, 'mapRecommended'], $this->bookRepository->findBooksByIds($ids));
    }

    /**
     * @param Collection<BookToBookFormat> $formats
     *
     * @return array
     */
    private function mapFormats(Collection $formats)
    {
        return $formats->map(fn (BookToBookFormat $formatJoin) => (new BookFormat())
                           ->setId($formatJoin->getFormat()->getId())
                           ->setTitle($formatJoin->getFormat()->getTitle())
                           ->setDescription($formatJoin->getFormat()->getDescription())
                           ->setComment($formatJoin->getFormat()->getComment())
                           ->setPrice($formatJoin->getPrice())
                           ->setDiscountPercent($formatJoin->getDiscountPercent()
                           ))->toArray();
    }
}
