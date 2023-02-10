<?php
namespace App\Controller\Api\v1;

use App\Attribute\QueryParam;
use App\DTO\Model\Exception\Response\ErrorResponse;
use App\DTO\Model\Reviews\ReviewPage;
use App\Service\Reviews\ReviewService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;
use App\Entity\Reviews\Review;


class ReviewController extends AbstractController
{


    public function __construct(private ReviewService $reviewService)
    {
    }

    /**
     * @OA\Parameter(
     *     name="page",
     *     in="query",
     *     description="Page number",
     *     @OA\Schema(@OA\Schema(type="interger"))
     * )
     * @OA\Response(
     *     response=200,
     *     description="Returns page of reviews for the given book",
     *     @Model(type=ReviewPage::class)
     * )
     */
    #[Route(path: '/api/v1/book/{id}/reviews', name: 'api.v1.book.reviews', methods: ['GET'])]
    public function getReviews(int $id, Request $request): JsonResponse
    {
        return $this->json($this->reviewService->getReviewPageByBookId($id, $request->query->get('page', 1)));
    }



    /*
    public function getReviewsFromQueryParamsAttribute(int $id, Request $request, #[QueryParam] $page = 1): JsonResponse
    {
        return $this->json($this->reviewService->getReviewPageByBookId($id, $page));
    }
    */
}
