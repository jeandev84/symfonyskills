<?php

namespace App\Controller\Api\v1;

use App\DTO\Model\Book\BookListResponse;
use App\DTO\Model\Exception\Response\ErrorResponse;
use App\Service\Book\BookService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\DTO\Model\Book\BookDetails;


class BookController extends AbstractController
{
    public function __construct(protected BookService $bookService)
    {
    }

    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns books inside a category",
     *     @Model(type=BookListResponse::class)
     * )
     * @OA\Response(
     *     response=404,
     *     description="Book category not found",
     *     @Model(type=ErrorResponse::class)
     * )
     */
    #[Route(path: '/api/v1/category/{id}/books', name: 'api.v1.category.books', methods: ['GET'])]
    public function getBooksByCategory(int $id): JsonResponse
    {
        return $this->json($this->bookService->getBooksByCategory($id));
    }



    /**
     * @OA\Response(
     *     response=200,
     *     description="Returns book detail information",
     *     @Model(type=BookDetails::class)
     * )
     * @OA\Response(
     *     response=404,
     *     description="Book not found",
     *     @Model(type=ErrorResponse::class)
     * )
     */
    #[Route(path: '/api/v1/book/{id}', name: 'api.v1.book.show', methods: ['GET'])]
    public function getBookById(int $id): JsonResponse
    {
        return $this->json($this->bookService->getBookById($id));
    }
}
