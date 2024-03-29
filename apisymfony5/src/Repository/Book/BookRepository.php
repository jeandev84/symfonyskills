<?php

namespace App\Repository\Book;

use App\Entity\Book\Book;
use App\Exception\Book\BookNotFoundException;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<Book>
 *
 * @method Book|null find($id, $lockMode = null, $lockVersion = null)
 * @method Book|null findOneBy(array $criteria, array $orderBy = null)
 * @method Book[]    findAll()
 * @method Book[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Book::class);
    }

    /**
     * @return Book[]
     */
    public function findBooksByCategoryId(int $categoryId): array
    {
        // DQL (Doctrine Query Language)
        $query = $this->_em->createQuery('SELECT b FROM App\Entity\Book\Book b WHERE :categoryId MEMBER OF b.categories');
        $query->setParameter('categoryId', $categoryId);

        return $query->getResult();
    }

    public function getById(int $id): Book
    {
        $book = $this->find($id);

        if (null === $book) {
            throw new BookNotFoundException();
        }

        return $book;
    }

    /**
     * @return Book[]
     */
    public function findBooksByIds(array $ids): array
    {
        return $this->findBy(['id' => $ids]);
    }
}
