<?php
namespace App\Factory;

use App\Entity\Manufacturer;

class ManufacturerFactory
{


     /**
      * @return Manufacturer
     */
     public static function createFake(): Manufacturer
     {
         $manufacturer = static::create();
         $manufacturer->setName('ACME');

         return $manufacturer;
     }


      /**
      * @return Manufacturer
     */
     public static function create(): Manufacturer
     {
          return new Manufacturer();
     }
}