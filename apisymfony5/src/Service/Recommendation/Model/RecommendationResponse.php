<?php
namespace App\Service\Recommendation\Model;

class RecommendationResponse
{
     public function __construct(private int $id, private int $ts, private array $recommendations)
     {
          // ts (signifit: timestamp)
     }


    /**
     * @return int
    */
    public function getId(): int
    {
        return $this->id;
    }


    /**
     * @return int
    */
    public function getTs(): int
    {
        return $this->ts;
    }


    /**
     * @return array
    */
    public function getRecommendations(): array
    {
        return $this->recommendations;
    }
}
