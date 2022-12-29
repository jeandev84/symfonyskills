### Relationship Bidirectional (OneToMany)


1. Relationship Bidirectional
```
<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
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
}




<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="product")
*/
class Product
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
      * $product->getManufacturer();
      *
      * This is the owning side. This must exist in the manufacturer-product relationship
      *
      * @ORM\ManyToOne(targetEntity="Manufacturer", inversedBy="products")
      * @ORM\JoinColumn(name="manufacturer_id", nullable=false, referencedColumnName="id")
     */
     private $manufacturer;

}

```



2. Make Migration AND Migrate
```
=========================== MIGRATION DIFF =======================
$ php bin/console doctrine:migrations:diff

Generated new migration class to "/home/yao/Desktop/webprojects/symfonyskills/doctrineorm/migrations/Version20221229093928.php"

To run just this migration for testing purposes, you can use migrations:execute --up 'DoctrineMigrations\\Version20221229093928'

To revert the migration you can use migrations:execute --down 'DoctrineMigrations\\Version20221229093928'

=========================== MIGRATION MIGRATE ====================
$ php bin/console doctrine:migrations:migrate

 WARNING! You are about to execute a migration in database "doctrineorm" that could result in schema changes and data loss. Are you sure you wish to continue? (yes/no) [yes]:
 > yes

[notice] Migrating up to DoctrineMigrations\Version20221229094636
[notice] finished in 101.1ms, used 22M memory, 1 migrations executed, 4 sql queries


```