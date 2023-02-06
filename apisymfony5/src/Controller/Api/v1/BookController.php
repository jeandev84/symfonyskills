<?php

namespace App\Controller\Api\v1;

use App\DTO\Model\Book\BookListResponse;
use App\Exception\Book\BookCategoryNotFoundException;
use App\Service\Book\BookService;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;

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
     *
     * @throws HttpException
     */
    #[Route(path: '/api/v1/category/{id}/books', name: 'api.v1.category.books', methods: ['GET'])]
       public function getBooksByCategory(int $id): JsonResponse
       {
           try {
               return $this->json($this->bookService->getBooksByCategory($id));
           } catch (BookCategoryNotFoundException $exception) {
               throw new HttpException($exception->getCode(), $exception->getMessage());
           }
       }
}
