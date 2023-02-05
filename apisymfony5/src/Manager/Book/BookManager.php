<?php

namespace App\Manager\Book;

use App\Entity\Book\Book;
use Doctrine\ORM\EntityManagerInterface;

class BookManager
{
    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }

    /**
     * @return Book[]
     */
    public function findBooks(): array
    {
        $repository = $this->entityManager->getRepository(Book::class);

        return $repository->findAll();
    }

    public function saveBook(Book $book): Book
    {
        $this->entityManager->persist($book);
        $this->entityManager->flush();

        return $book;
    }

    public function createBook(array $credentials): Book
    {
        $book = new Book();
        $book->setTitle($credentials['title']);

        return $this->saveBook($book);
    }
}
