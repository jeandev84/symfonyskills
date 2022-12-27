<?php
namespace App\Repository;

use App\Entity\Product;
use App\Entity\Promotion;
use Doctrine\Bundle\DoctrineBundle\Repository\ServiceEntityRepository;
use Doctrine\Persistence\ManagerRegistry;
use Symfony\Contracts\Cache\CacheInterface;

/**
 * @extends ServiceEntityRepository<Promotion>
 *
 * @method Promotion|null find($id, $lockMode = null, $lockVersion = null)
 * @method Promotion|null findOneBy(array $criteria, array $orderBy = null)
 * @method Promotion[]    findAll()
 * @method Promotion[]    findBy(array $criteria, array $orderBy = null, $limit = null, $offset = null)
 */
class PromotionRepository extends ServiceEntityRepository
{

//    /**
//     * @var CacheInterface
//    */
//    protected $cache;


    /**
     * @param ManagerRegistry $registry
//   * @param CacheInterface $cache
    */
    public function __construct(ManagerRegistry $registry/*, CacheInterface $cache*/)
    {
        parent::__construct($registry, Promotion::class);

        /* $this->cache = $cache; */
    }




    /**
     * @param Product $product
     * @param \DateTimeInterface $requestDate
     * @return mixed
    */
    public function findValidForProduct(Product $product, \DateTimeInterface $requestDate)
    {
          //...


          // alias 'p' : promotion
          return $this->createQueryBuilder('p')
                      ->innerJoin('p.productPromotions', 'pp')
                      ->andWhere('pp.product = :product')
                      ->andWhere('pp.validTo > :requestDate OR pp.validTo IS NULL')
                      ->setParameter('product', $product)
                      ->setParameter('requestDate', $requestDate)
                      ->getQuery()
                      ->getResult();
    }




    /**
     * @param Promotion $entity
     * @param bool $flush
     * @return void
    */
    public function save(Promotion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->persist($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }


    /**
     * @param Promotion $entity
     * @param bool $flush
     * @return void
    */
    public function remove(Promotion $entity, bool $flush = false): void
    {
        $this->getEntityManager()->remove($entity);

        if ($flush) {
            $this->getEntityManager()->flush();
        }
    }
}
