<?php

namespace App\Service\Reviews;

use App\DTO\Model\Reviews\Review as ReviewModel;
use App\DTO\Model\Reviews\ReviewPage;
use App\Entity\Reviews\Review;
use App\Repository\Reviews\ReviewRepository;

class ReviewService
{
    private const PAGE_LIMIT = 5;

    public function __construct(
        private ReviewRepository $reviewRepository,
        private RatingService $ratingService
    ) {
    }

    public function getReviewPageByBookId(int $id, int $page): ReviewPage
    {
        $offset = max($page - 1, 0) * self::PAGE_LIMIT; // (3 - 1 = 2) * 5  + 1 = 11
        $paginator = $this->reviewRepository->getPageByBookId($id, $offset, self::PAGE_LIMIT);
        $total = count($paginator);

        $items = [];

        foreach ($paginator as $item) {
            $items[] = $this->map($item);
        }


        return (new ReviewPage())
               ->setRating($this->ratingService->calculateReviewRatingForBook($id, $total))
               ->setTotal($total)
               ->setPage($page)
               ->setPerPage(self::PAGE_LIMIT)
               ->setPages(ceil($total / self::PAGE_LIMIT))
               ->setItems($items);
    }

    public function map(Review $review): ReviewModel
    {
        return (new ReviewModel())
             ->setId($review->getId())
             ->setRating($review->getRating())
             ->setCreatedAt($review->getCreatedAt()->getTimestamp())
             ->setAuthor($review->getAuthor())
             ->setContent($review->getContent());
    }
}
