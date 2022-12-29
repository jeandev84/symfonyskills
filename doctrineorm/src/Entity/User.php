<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
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
      * Many users can be members of the many interest groups
      *
      * @ORM\ManyToMany(targetEntity="InterestGroup", inversedBy="members")
      * @ORM\JoinTable(name="users_interest_groups")
     */
     private $interestGroups;



     public function __construct()
     {
         $this->interestGroups = new ArrayCollection();
     }




    /**
      * @return mixed
     */
     public function getId()
     {
        return $this->id;
     }




    /**
     * @param Address $address
    */
    public function setAddress(Address $address): void
    {
        $this->address = $address;
    }




    /**
     * @return Address
    */
    public function getAddress(): Address
    {
        return $this->address;
    }


    /**
     * @return ArrayCollection
    */
    public function getInterestGroups(): ArrayCollection
    {
        return $this->interestGroups;
    }




    public function joinInterestGroup(InterestGroup $interestGroup)
    {
         // Add the user to the group
         $interestGroup->addMember($this);


         // Add the group to the users
         $this->interestGroups[] = $interestGroup;
    }
}