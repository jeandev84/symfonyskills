<?php

class Song
{
    private string $name;
    private int $numberOfPlays;


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
     * @return int
    */
    public function getNumberOfPlays(): int
    {
        return $this->numberOfPlays;
    }
}