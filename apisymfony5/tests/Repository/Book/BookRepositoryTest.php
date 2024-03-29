<?php

namespace App\Tests\Repository\Book;

use App\Entity\Book\Book;
use App\Entity\Book\BookCategory;
use App\Repository\Book\BookRepository;
use App\Tests\AbstractRepositoryTest;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;

class BookRepositoryTest extends AbstractRepositoryTest
{
    private BookRepository $bookRepository;

    protected function setUp(): void
    {
        parent::setUp();

        $this->bookRepository = $this->getRepositoryForEntity(Book::class);
    }

    public function testFindBooksByCategoryId()
    {
        $devicesCategory = (new BookCategory())->setTitle('Devices')->setSlug('devices');

        $this->em->persist($devicesCategory);

        for ($i = 0; $i < 5; ++$i) {
            $book = $this->createBook('device-'.$i, $devicesCategory);
            $this->em->persist($book);
        }

        $this->em->flush();

        $this->assertCount(5, $this->bookRepository->findBooksByCategoryId($devicesCategory->getId()));
    }

    protected function createBook(string $title, BookCategory $bookCategory): Book
    {
        return (new Book())
                  ->setPublicationDate(new DateTimeImmutable())
                  ->setAuthors(['author'])
                  ->setMeap(false)
                  ->setSlug($title)
                  ->setIsbn('123321')
                  ->setDescription('test description')
                  ->setCategories(new ArrayCollection([$bookCategory]))
                  ->setTitle($title)
                  ->setImage("http://localhost/{$title}.png");
    }
}
