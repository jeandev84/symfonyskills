<?php
namespace App\Cache;

use App\Entity\Product;
use App\Entity\Promotion;
use App\Repository\PromotionRepository;
use Psr\Cache\InvalidArgumentException;
use Symfony\Contracts\Cache\CacheInterface;
use Symfony\Contracts\Cache\ItemInterface;

class PromotionCache
{


     /**
      * @param CacheInterface $cache
     */
     public function __construct(
         private CacheInterface $cache,
         private PromotionRepository $repository
     )
     {
     }




     /**
      * @param Product $product
      * @param string $requestDate
      * @return array|null
      * @throws InvalidArgumentException
     */
     public function findValidForProduct(Product $product, string $requestDate): ?array
     {
         $key = sprintf("find-valid-for-product-%d", $product->getId());

         // IF $key exists in cache, we'll get data from cache, over-wise we'll get from database
         return $this->cache->get($key, function (ItemInterface $item) use ($product, $requestDate) {

             // $item->expiresAfter(3600); // 3600s ..., 5 seconds
             $item->expiresAfter(5);

             var_dump('Miss from database');

             return $this->repository->findValidForProduct(
                 $product,
                 date_create_immutable($requestDate)
             ); // Handling if promotions not found.

         });

     }
}