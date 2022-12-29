<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Panier
 *
 * @ORM\Entity
 * @ORM\Table(name="cart")
*/
class Cart
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
     */
    private $id;



    /**
     * One cart belongs to one customer
     *
     * @ORM\OneToOne(targetEntity="Customer", inversedBy="cart")
     * @ORM\JoinColumn(name="customer_id", nullable=false, referencedColumnName="id")
    */
    private $customer;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param Customer $customer
    */
    public function setCustomer(Customer $customer): void
    {
        $this->customer = $customer;
    }





    /**
     * @return Customer
    */
    public function getCustomer(): Customer
    {
        return $this->customer;
    }

}