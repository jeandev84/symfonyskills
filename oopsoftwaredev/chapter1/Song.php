<?php

class Song
{
    public $name;
    public $numberOfPlays;


    /**
     * @param string $name
     * @param int $numberOfPlays
    */
    public function __construct(string $name, int $numberOfPlays)
    {
         $this->name = $name;
         $this->numberOfPlays = $numberOfPlays;
    }
}