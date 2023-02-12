<?php
namespace App\Service\Recommendation\Model;

class RecommendationItem
{

     public function __construct(private int $id)
     {
     }


     /**
      * @return int
     */
     public function getId(): int
     {
        return $this->id;
     }
}
