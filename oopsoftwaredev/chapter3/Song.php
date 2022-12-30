<?php

class Song
{
    public string $name;
    public int $numberOfPlays;


    /**
     * Song rating from 0 to 8
     * Half ratings allowed e.g. 3.5
     *
     * @var int|float
    */
    private int|float $rating;




    /**
     * @param string $name
     * @param int $numberOfPlays
    */
    public function __construct(string $name, int $numberOfPlays)
    {
         $this->name = $name;
         $this->numberOfPlays = $numberOfPlays;
    }



    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param string $name
    */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return int
    */
    public function getNumberOfPlays(): int
    {
        return $this->numberOfPlays;
    }


    /**
     * @param int $numberOfPlays
    */
    public function setNumberOfPlays(int $numberOfPlays): void
    {
         $this->numberOfPlays = $numberOfPlays;
    }


    /**
     * @return float|int
    */
    public function getRating(): float|int
    {
        return $this->rating;
    }




    /**
     * @param float|int $rating
    */
    public function setRating(float|int $rating): void
    {
        // If < 0 attempted, set to 0
        $rating = max(0, $rating);

        // if > 5 attempted, set to 5
        $this->rating = min(5, $rating);
    }
}