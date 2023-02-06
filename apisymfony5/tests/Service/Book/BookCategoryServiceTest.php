<?php

namespace App\Tests\Service\Book;

use App\DTO\Model\Book\Category\BookCategoryListItem;
use App\DTO\Model\Book\Category\BookCategoryListResponse;
use App\Entity\Book\BookCategory;
use App\Repository\Book\BookCategoryRepository;
use App\Service\Book\Category\BookCategoryService;
use App\Tests\AbstractTestCase;

class BookCategoryServiceTest extends AbstractTestCase
{
    public function testGetCategories(): void
    {
        $category = (new BookCategory())->setTitle('Test')->setSlug('test');
        $this->setEntityId($category, 7);

        // Mocked Repository
        $repository = $this->createMock(BookCategoryRepository::class);

        // Define method will be called and what we want to return
        $repository->expects($this->once())
                    ->method('findAllSortedByTitle')
                    ->willReturn([$category]);

        // Call services
        $service = new BookCategoryService($repository);
        $expected = new BookCategoryListResponse([new BookCategoryListItem(7, 'Test', 'test')]);

        $this->assertEquals($expected, $service->getCategories());
    }
}
