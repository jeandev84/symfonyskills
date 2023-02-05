<?php
namespace App\Controller\Api\v1;

use App\Service\Book\BookCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;


class BookCategoryController extends AbstractController
{
       public function __construct(protected BookCategoryService $bookCategoryService)
       {
       }



       #[Route(path: '/api/v1/book/categories', name: 'api.v1.book.categories')]
       public function listBookCategories():JsonResponse
       {
           return $this->json($this->bookCategoryService->getCategories());
       }
}
