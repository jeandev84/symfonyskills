<?php

namespace App\Repository\Book;

use App\Entity\Book\BookFormat;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;

/**
 * @extends ServiceEntityRepository<BookFormat>
 *
 * @method BookFormat|null find($id, $lockMode = null, $lockVersion = null)
 * @method BookFormat|null findOneBy(array $criteria, array $orderBy = null)
 * @method BookFormat[]    findAll()
 * @method BookFormat[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class BookFormatRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, BookFormat::class);
    }
}
