<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="manufacturer")
*/
class Manufacturer
{

     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue()
     */
     private $id;


     /**
      * @ORM\Column(type="string")
     */
     private $name;



     /**
      *  $manufacturer->getProducts();
      *
      * This is the inverse side of the manufacturer-product relationship. This key is optional...only declare it if you will use it.
      *
      * @ORM\OneToMany(targetEntity="Product", mappedBy="manufacturer")
     */
     private $products;
}