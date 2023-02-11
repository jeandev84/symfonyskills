<?php

namespace App\Service\Reviews;

use App\Repository\Reviews\ReviewRepository;

class RatingService
{
    public function __construct(private ReviewRepository $reviewRepository)
    {
    }

    public function calculateReviewRatingForBook(int $id, int $total): float
    {
        return $total > 0 ? $this->reviewRepository->getBookTotalRatingSum($id) / $total : 0;
    }
}
