<?php

namespace App\Tests\Service\Reviews;

use App\Repository\Reviews\ReviewRepository;
use App\Service\Reviews\RatingService;
use App\Tests\AbstractTestCase;

class RatingServiceTest extends AbstractTestCase
{
    private ReviewRepository $reviewRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reviewRepository = $this->createMock(ReviewRepository::class);
    }

    public function provider(): array
    {
        return [
           [25, 20, 1.25],
           [0, 5, 0],
        ];
    }

    /**
     * @dataProvider provider
     */
    public function testCalculateReviewRatingForBook(int $repositoryRatingSum, int $total, float $expectedRating): void
    {
        $this->reviewRepository->expects($this->once())
                               ->method('getBookTotalRatingSum')
                               ->with(1)
                               ->willReturn($repositoryRatingSum);

        $this->assertEquals(
            $expectedRating,
            (new RatingService($this->reviewRepository))->calculateReviewRatingForBook(1, $total)
        );
    }



    public function testCalculateReviewRatingForBookZeroTotal(): void
    {
        $this->reviewRepository->expects($this->never())->method('getBookTotalRatingSum');

        $this->assertEquals(0, (new RatingService($this->reviewRepository))->calculateReviewRatingForBook(1, 0));
    }
}
