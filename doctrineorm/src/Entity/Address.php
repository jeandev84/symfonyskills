<?php
namespace App\Entity;


use Doctrine\ORM\Mapping as ORM;


/**
 * Addresse
 *
 * @ORM\Entity
 * @ORM\Table(name="address")
*/
class Address
{



     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue()
     */
     private $id;




     /**
      * @ORM\Column(type="integer")
     */
     private $number;




     /**
      * @ORM\Column(type="string")
     */
     private $street;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $number
     */
    public function setNumber($number): void
    {
        $this->number = $number;
    }


    /**
     * @return mixed
     */
    public function getNumber()
    {
        return $this->number;
    }


    /**
     * @param mixed $street
     */
    public function setStreet($street): void
    {
        $this->street = $street;
    }


    /**
     * @return mixed
    */
    public function getStreet()
    {
        return $this->street;
    }
}