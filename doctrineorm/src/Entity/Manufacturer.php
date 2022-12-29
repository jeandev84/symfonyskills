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
      * @ORM\GeneratedValue
     */
     private $id;


     /**
      * @ORM\Id
      * @ORM\Column(type="string")
     */
     private $name;


     private $products;
}