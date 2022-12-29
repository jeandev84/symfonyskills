### ManyToMany Relationship 


1. ManyToMany
```php 

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

```


2. Make migration file and migrate table to the database
```
$ php bin/console doctrine:migrations:diff

 Generated new migration class to "/home/yao/Desktop/webprojects/symfonyskills/doctrineorm/migrations/Version20221229212855.php"
 
 To run just this migration for testing purposes, you can use migrations:execute --up 'DoctrineMigrations\\Version20221229212855'
 
 To revert the migration you can use migrations:execute --down 'DoctrineMigrations\\Version20221229212855'


$ php bin/console doctrine:migrations:migrate

  WARNING! You are about to execute a migration in database "doctrineorm" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > 

[notice] Migrating up to DoctrineMigrations\Version20221229212855
[notice] finished in 143.3ms, used 22M memory, 1 migrations executed, 4 sql queries


```