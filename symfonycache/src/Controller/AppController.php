<?php
namespace App\Controller;

use App\Entity\Stock;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Cache\Adapter\FilesystemAdapter;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Contracts\Cache\ItemInterface;


class AppController extends AbstractController
{

       #[Route('/stock/{symbol}', name: 'get-stock', methods: ['GET'])]
       public function stock($symbol, EntityManagerInterface $entityManager)
       {
              // e.g http://localhost:8000/stock/amzn
              // e.g http://localhost:8000/stock/tsla
              // e.g http://localhost:8000/stock/shop
              // e.g http://localhost:8000/stock/aapl

              $symbol = strtoupper($symbol);

              $cache = new FilesystemAdapter();

              /** @var Stock $stock */
              $stock = $cache->get($symbol, function (ItemInterface $item) use ($symbol, $entityManager){

                   echo 'Miss<br>';

                   $item->expiresAt(date_create('tomorrow')); // midnight

                   // $item->expiresAfter(3600); // 1 hour

                   $repo = $entityManager->getRepository(Stock::class);

                   return $repo->findOneBy(['symbol' => $symbol]);

              });

              /*
              $cache->delete($symbol);
              $cache->clear();
              */

              return new Response("{$stock->getShortName()} has a current value of {$stock->getPrice()}");
       }






    #[Route('/stock-demo-1/{symbol}', name: 'get-stock-demo-1', methods: ['GET'])]
    public function stockDemo($symbol, EntityManagerInterface $entityManager)
    {
        // e.g http://localhost:8000/stock/amzn
        // e.g http://localhost:8000/stock/tsla
        // e.g http://localhost:8000/stock/shop
        // e.g http://localhost:8000/stock/aapl

        $symbol = strtoupper($symbol);

        $cache = new FilesystemAdapter();

        /** @var Stock $stock */
        $stock = $cache->get($symbol, function (ItemInterface $item) use ($symbol, $entityManager){

            echo 'Miss<br>';

            $repo = $entityManager->getRepository(Stock::class);

            return $repo->findOneBy(['symbol' => $symbol]);

        });

        // $cache->delete($symbol);
        $cache->clear();

        return new Response("{$stock->getShortName()} has a current value of {$stock->getPrice()}");
    }
}