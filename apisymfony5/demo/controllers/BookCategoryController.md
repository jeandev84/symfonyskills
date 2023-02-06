### BookCategoryController

```php
<?php
namespace App\Controller\Api\v1;

use App\Service\Book\BookCategoryService;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Routing\Annotation\Route;
use App\DTO\Model\Book\Category\BookCategoryListResponse;
use Nelmio\ApiDocBundle\Annotation\Model;
use OpenApi\Annotations as OA;


class BookCategoryController extends AbstractController
{
       public function __construct(protected BookCategoryService $bookCategoryService)
       {
       }


       /**
        * @OA\Response(
        *     response=200,
        *     description="Returns book categories",
        *     @Model(type=BookCategoryListResponse::class)
        * )
        * @return JsonResponse
       */
       #[Route(path: '/api/v1/book/categories', name: 'api.v1.book.categories', methods: ['GET'])]
       public function listBookCategories():JsonResponse
       {
           return $this->json($this->bookCategoryService->getCategories());
       }
}
```
