<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;



/**
 * Client (e)
 *
 * @ORM\Entity
 * @ORM\Table(name="customer")
*/
class Customer
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    */
    private $id;



    /**
     * One customer has on cart
     *
     *
     * @ORM\OneToOne(targetEntity="Cart", mappedBy="customer")
    */
    private $cart;




    /**
     * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }




    /**
     * @return Cart
    */
    public function getCart(): Cart
    {
        return $this->cart;
    }

}