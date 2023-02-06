<?php
namespace App\Tests\Service\Book;

use App\DTO\Model\Book\Category\BookCategoryListItem;
use App\DTO\Model\Book\Category\BookCategoryListResponse;
use App\Entity\Book\BookCategory;
use App\Repository\Book\BookCategoryRepository;
use App\Service\Book\Category\BookCategoryService;
use Doctrine\Common\Collections\Criteria;
use PHPUnit\Framework\TestCase;

class BookCategoryServiceTest extends TestCase
{

    public function testGetCategories(): void
    {
         # Mocked Repository
         $repository = $this->createMock(BookCategoryRepository::class);


         # Define method will be called and what we want to return
         $repository->expects($this->once()) // Method findBy() will be called once times
                    ->method('findBy')
                    ->with([], ['title' => Criteria::ASC])
                    ->willReturn([(new BookCategory())->setId(7)->setTitle('Test')->setSlug('test')]);


         # Call services
         $service = new BookCategoryService($repository);
         $expected = new BookCategoryListResponse([new BookCategoryListItem(7, 'Test', 'test')]);

         $this->assertEquals($expected, $service->getCategories());
    }
}
