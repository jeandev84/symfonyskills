<?php

class Sphere extends ThreeDimensionalShape
{

    /**
     * Calculate the volume [V = ((4 * π * r3) / 3)]
     * @return float
    */
    public function volume(): float
    {
         return (4 * pi() * pow($this->dimensions['radius'], 3)) / 3;
    }
}