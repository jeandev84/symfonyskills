<?php
require_once __DIR__.'/ThreeDimensionalShape.php';



class Cylinder extends ThreeDimensionalShape
{


    /**
     * Calculate the volume [V = π * r2 * h]
     * @return float
    */
    public function volume(): float
    {
         return pi() * pow($this->dimensions['radius'], 2) * $this->dimensions['height'];
    }
}