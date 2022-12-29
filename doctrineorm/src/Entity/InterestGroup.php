<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;


/**
 * Groupe d'interêt
 * @ORM\Entity
 * @ORM\Table(name="interest_group")
*/
class InterestGroup
{

      /**
       * @ORM\Id
       * @ORM\Column(type="integer")
       * @ORM\GeneratedValue
      */
      private $id;



      /**
       * @ORM\Column(type="string")
      */
      private $name;



      /**
       * Many interest groups can have many members
       *
       * @ORM\ManyToMany(targetEntity="User", mappedBy="interestGroups")
      */
      private $members;




      public function __construct()
      {
           $this->members = new ArrayCollection();
      }




      /**
       * @return mixed
      */
      public function getId()
      {
          return $this->id;
      }




      /**
       * @return string
      */
      public function getName(): string
      {
          return $this->name;
      }


      /**
       * @param string $name
      */
      public function setName(string $name): void
      {
          $this->name = $name;
      }


      /**
       * @return ArrayCollection
      */
      public function getMembers(): ArrayCollection
      {
          return $this->members;
      }


      /**
       * @param User $member
       * @return void
      */
      public function addMember(User $member)
      {
          $this->members[] = $member;
      }

}