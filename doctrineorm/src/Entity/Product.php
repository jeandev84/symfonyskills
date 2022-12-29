<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
*/
class Product
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
      * $product->getManufacturer();
      *
      * This is the owning side. This must exist in the manufacturer-product relationship
      *
      * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
      * @ORM\JoinColumn(name="manufacturer_id", nullable=false, referencedColumnName="id")
      *
      * @var Manufacturer
     */
     private $manufacturer;







     /**
      * @return mixed
     */
     public function getId()
     {
        return $this->id;
     }




    /**
     * @return mixed
    */
    public function getName()
    {
        return $this->name;
    }




    /**
     * @param mixed $name
     * @return Product
    */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }




    /**
     * @return Manufacturer
    */
    public function getManufacturer(): Manufacturer
    {
        return $this->manufacturer;
    }




    /**
     * @param Manufacturer $manufacturer
     * @return Product
    */
    public function setManufacturer(Manufacturer $manufacturer): Product
    {
        $this->manufacturer = $manufacturer;

        return $this;
    }


}