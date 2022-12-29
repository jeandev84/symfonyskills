<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Fabricant
 *
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




     public function __construct()
     {
          $this->products = new ArrayCollection();
     }




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
     * @return Manufacturer
    */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }



    /**
     * @param Product $product
     * @return void
    */
    public function addProduct(Product $product)
    {
        $this->products[] = $product;
    }



    /**
     * @return Collection|Product[]
    */
    public function getProducts(): Collection
    {
        return $this->products;
    }

}