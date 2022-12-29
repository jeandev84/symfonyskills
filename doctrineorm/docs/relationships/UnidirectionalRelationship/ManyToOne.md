### Relationship Unidirectional (ManyToOne)


1. Realationship ManyToOne (Unidirectionnel)
```php
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



<?php
namespace App\Entity;


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

```


2. Generate Migration File And Migrate tables to the database
```
$ bin/console doctrine:migrations:diff

 Generated new migration class to "/home/yao/Desktop/webprojects/symfonyskills/doctrineorm/migrations/Version20221229164445.php"
 
 To run just this migration for testing purposes, you can use migrations:execute --up 'DoctrineMigrations\\Version20221229164445'
 
 To revert the migration you can use migrations:execute --down 'DoctrineMigrations\\Version20221229164445'
 

$ bin/console doctrine:migrations:migrate
```