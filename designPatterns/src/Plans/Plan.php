<?php
namespace App\Plans;

abstract class Plan
{

     /**
      * @var array
     */
     protected array $features = [];



     /**
      * @return int
     */
     abstract public function getRate(): int;



     public function getFeatures(): array
     {
          return $this->features;
     }
}