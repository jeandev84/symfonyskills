<?php
namespace App\Manager;

use Doctrine\ORM\EntityManagerInterface;

class StockManager
{

      public function __construct(private EntityManagerInterface $entityManager)
      {
      }


      public function createStock()
      {

      }
}