<?php
namespace App\Entity;


/**
 * @ORM\Entity
 * @ORM\Table(name="product")
*/
class Product
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




     /**
      * $product->getManufacturer();
      *
      * This is the owning side. This must exist in the manufacturer-product relationship
      *
      * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
      * @ORM\JoinColumn(name="manufacturer_id", nullable=false, referencedColumnName="id")
     */
     private $manufacturer;

}