<?php
namespace App\Controller\Api\v1;

use App\Exception\Book\BookCategoryNotFoundException;
use App\Service\Book\BookService;
use App\DTO\Model\Book\BookListResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpKernel\Exception\HttpException;
use Symfony\Component\Routing\Annotation\Route;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;


class BookController extends AbstractController
{
       public function __construct(protected BookService $bookService)
       {
       }


       /**
        * @OA\Response(
        *     response=200,
        *     description="Returns books",
        *     @Model(type=BookListResponse::class)
        * )
        * @param int $id
        * @return JsonResponse
        * @throws HttpException
       */
       #[Route(path: '/api/v1/category/{id}/books', name: 'api.v1.category.books', methods: ['GET'])]
       public function getBooksByCategory(int $id):JsonResponse
       {
           try {

               return $this->json($this->bookService->getBooksByCategory($id));

           } catch (BookCategoryNotFoundException $exception) {

               throw new HttpException($exception->getCode(), $exception->getMessage());
           }
       }
}
