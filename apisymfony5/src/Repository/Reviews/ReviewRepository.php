<?php

namespace App\Repository\Reviews;

use App\Entity\Reviews\Review;
use Countable;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\ORM\NonUniqueResultException;
use Doctrine\ORM\NoResultException;
use Doctrine\ORM\Tools\Pagination\Paginator;
use Doctrine\Persistence\ManagerRegistry;
use Traversable;

/**
 * @extends ServiceEntityRepository<Review>
 *
 * @method Review|null find($id, $lockMode = null, $lockVersion = null)
 * @method Review|null findOneBy(array $criteria, array $orderBy = null)
 * @method Review[]    findAll()
 * @method Review[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class ReviewRepository extends ServiceEntityRepository
{
    public function __construct(ManagerRegistry $registry)
    {
        parent::__construct($registry, Review::class);
    }

    public function countByBookId(int $id): int
    {
        return $this->count(['book' => $id]);
    }

    /**
     * @throws NoResultException
     * @throws NonUniqueResultException
     */
    public function getBookTotalRatingSum(int $id): int
    {
        return (int) $this->_em->createQuery(
            'SELECT SUM(r.rating) FROM App\Entity\Reviews\Review r WHERE r.book = :id'
        )->setParameter('id', $id)
         ->getSingleScalarResult();
    }

    /**
     * @return Traversable&Countable
     */
    public function getPageByBookId(int $id, int $offset, int $limit): Paginator
    {
        $query = $this->_em
                     ->createQuery('SELECT r FROM App\Entity\Reviews\Review r WHERE r.book = :id ORDER BY r.createdAt DESC')
                     ->setParameter('id', $id)
                     ->setFirstResult($offset)
                     ->setMaxResults($limit);

        return new Paginator($query, false);
    }
}
