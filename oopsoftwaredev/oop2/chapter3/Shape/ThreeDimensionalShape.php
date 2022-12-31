<?php

abstract class ThreeDimensionalShape
{

      /**
       * @var array
      */
      protected array $dimensions;


      /**
       * @param array $dimensions
      */
      public function __construct(array $dimensions)
      {
           $this->dimensions = $dimensions;
      }



      /**
       * Calculate volume
       *
       * @return float
      */
      abstract public function volume(): float;
}