### OneToOneRelationship


1. Relation
```php
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

```


2. Generate migration file and Migrate to the database
```
$ bin/console doctrine:migrations:diff

Generated new migration class to "/home/yao/Desktop/webprojects/symfonyskills/doctrineorm/migrations/Version20221229191421.php"
 
 To run just this migration for testing purposes, you can use migrations:execute --up 'DoctrineMigrations\\Version20221229191421'
 
 To revert the migration you can use migrations:execute --down 'DoctrineMigrations\\Version20221229191421'


$ bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "doctrineorm" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > 

[notice] Migrating up to DoctrineMigrations\Version20221229191421
[notice] finished in 100ms, used 22M memory, 1 migrations executed, 3 sql queries

```


3. OneToOne Self Joining
```php
<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * Etudiant
 *
 * @ORM\Entity
 * @ORM\Table(name="student")
*/
class Student
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue
    */
    private $id;



    /**
     * @ORM\OneToOne(targetEntity="Student")
     * @ORM\JoinColumn(name="mentor_id", referencedColumnName="id")
    */
    private $mentor;


    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param Student $mentor
     */
    public function setMentor(Student $mentor): void
    {
        $this->mentor = $mentor;
    }


    /**
     * @return Student
     */
    public function getMentor(): Student
    {
        return $this->mentor;
    }

}

```


2. Generate migration file and Migrate to the database
```
$ bin/console doctrine:migrations:diff

 Generated new migration class to "/home/yao/Desktop/webprojects/symfonyskills/doctrineorm/migrations/Version20221229202443.php"
 
 To run just this migration for testing purposes, you can use migrations:execute --up 'DoctrineMigrations\\Version20221229202443'
 
 To revert the migration you can use migrations:execute --down 'DoctrineMigrations\\Version20221229202443'


$ bin/console doctrine:migrations:migrate

  WARNING! You are about to execute a migration in database "doctrineorm" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > 

[notice] Migrating up to DoctrineMigrations\Version20221229202443
[notice] finished in 188.6ms, used 22M memory, 1 migrations executed, 2 sql queries


```
