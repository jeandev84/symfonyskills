<?php

namespace App\Tests\Service\Book;

use App\DTO\Model\Book\BookListItem;
use App\DTO\Model\Book\BookListResponse;
use App\Entity\Book\Book;
use App\Entity\Book\BookCategory;
use App\Exception\Book\BookCategoryNotFoundException;
use App\Repository\Book\BookCategoryRepository;
use App\Repository\Book\BookRepository;
use App\Service\Book\BookService;
use App\Tests\AbstractTestCase;
use Doctrine\Common\Collections\ArrayCollection;

class BookServiceTest extends AbstractTestCase
{
    public function testGetBooksByCategoryNotFound(): void
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $bookCategoryRepository->expects($this->once())
                                 ->method('existsById')
                                 ->with(130)
                                 ->willReturn(false)
        ;

        $this->expectException(BookCategoryNotFoundException::class);

        (new BookService($bookRepository, $bookCategoryRepository))->getBooksByCategory(130);
    }

    public function testGetBooksByCategory(): void
    {
        $bookRepository = $this->createMock(BookRepository::class);
        $bookRepository->expects($this->once())
                       ->method('findBooksByCategoryId')
                       ->with(130)
                       ->willReturn($this->createBookEntity());

        $bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $bookCategoryRepository->expects($this->once())
                                ->method('existsById')
                                ->with(130)
                                ->willReturn(true)
        ;

        $service = new BookService($bookRepository, $bookCategoryRepository);
        $expected = new BookListResponse([$this->createBookItemModel()]);

        $this->assertEquals($expected, $service->getBooksByCategory(130));
    }

    private function createBookEntity(): Book
    {
        $book = (new Book())
                ->setTitle('Test Book')
                ->setSlug('test-book')
                ->setMeap(false)
                ->setAuthors(['Tester'])
                ->setImage('http://localhost/test.png')
                ->setCategories(new ArrayCollection())
                ->setPublicationDate(new \DateTime('2020-10-10'));

        $this->setEntityId($book, 123);

        return $book;
    }

    private function createBookItemModel(): BookListItem
    {
        return (new BookListItem())
             ->setId(123)
             ->setTitle('Test Book')
             ->setSlug('test-book')
             ->setMeap(false)
             ->setAuthors(['Tester'])
             ->setImage('http://localhost/test.png')
             ->setPublicationDate(1602277200);
    }
}
