<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Utilisateur
 *
 * @ORM\Entity
 * @ORM\Table(name="user")
*/
class User
{

     /**
      * @ORM\Id
      * @ORM\Column(type="integer")
      * @ORM\GeneratedValue()
     */
     private $id;


     // ..other properties


     /**
      * @ORM\ManyToOne(targetEntity="Address")
      * @ORM\JoinColumn(name="address_id")
     */
     private $address;




    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param mixed $address
     */
    public function setAddress($address): void
    {
        $this->address = $address;
    }


    /**
     * @return mixed
    */
    public function getAddress()
    {
        return $this->address;
    }
}