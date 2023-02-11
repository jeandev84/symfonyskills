<?php

namespace App\Tests\Service\Book;

use App\DTO\Model\Book\BookListItem;
use App\DTO\Model\Book\BookListResponse;
use App\Entity\Book\Book;
use App\Exception\Book\Category\BookCategoryNotFoundException;
use App\Repository\Book\BookCategoryRepository;
use App\Repository\Book\BookRepository;
use App\Repository\Reviews\ReviewRepository;
use App\Service\Book\BookService;
use App\Service\Reviews\RatingService;
use App\Tests\AbstractTestCase;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class BookServiceTest extends AbstractTestCase
{
    private ReviewRepository $reviewRepository;

    private BookRepository $bookRepository;

    private BookCategoryRepository $bookCategoryRepository;

    private RatingService $ratingService;

    protected function setUp(): void
    {
        parent::setUp();

        $this->reviewRepository = $this->createMock(ReviewRepository::class);
        $this->bookRepository = $this->createMock(BookRepository::class);
        $this->bookCategoryRepository = $this->createMock(BookCategoryRepository::class);
        $this->ratingService = $this->createMock(RatingService::class);
    }

    public function testGetBooksByCategoryNotFound(): void
    {
        $this->bookCategoryRepository->expects($this->once())
                                 ->method('existsById')
                                 ->with(130)
                                 ->willReturn(false)
        ;

        $this->expectException(BookCategoryNotFoundException::class);

        $this->createBookService()->getBooksByCategory(130);
    }

    public function testGetBooksByCategory(): void
    {
        $this->bookRepository->expects($this->once())
                       ->method('findBooksByCategoryId')
                       ->with(130)
                       ->willReturn($this->createBookEntity());

        $this->bookCategoryRepository->expects($this->once())
                                ->method('existsById')
                                ->with(130)
                                ->willReturn(true);

        $expected = new BookListResponse([$this->createBookItemModel()]);

        $this->assertEquals($expected, $this->createBookService()->getBooksByCategory(130));
    }

    private function createBookService(): BookService
    {
        return new BookService(
            $this->bookRepository,
            $this->bookCategoryRepository,
            $this->reviewRepository,
            $this->ratingService
        );
    }

    private function createBookEntity(): Book
    {
        $book = (new Book())
                ->setTitle('Test Book')
                ->setSlug('test-book')
                ->setMeap(false)
                ->setIsbn('123321')
                ->setDescription('test description')
                ->setAuthors(['Tester'])
                ->setImage('http://localhost/test.png')
                ->setCategories(new ArrayCollection())
                ->setPublicationDate(new DateTimeImmutable('2020-10-10'));

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
