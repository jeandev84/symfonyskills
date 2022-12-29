### OneToManySelfJoining


```

<?php
namespace App\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;



/**
 * Produit
 *
 * @ORM\Entity
 * @ORM\Table(name="category")
*/
class Category
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
      * This is the inverse side.
      *
      *
      * @ORM\OneToMany(targetEntity="Category", mappedBy="parent", cascade={"persist"})
     */
     private $children;




     /**
       * This is the owning side.
       *
       * @ORM\ManyToOne(targetEntity="Category", inversedBy="children")
       * @ORM\JoinColumn(name="parent_id", referencedColumnName="id")
     */
     private $parent;


     public function __construct($name)
     {
          $this->children = new ArrayCollection();

          $this->name = $name;
     }




     /**
      * @return mixed
     */
     public function getId()
     {
        return $this->id;
     }



     /**
      * @param mixed $name
     */
     public function setName($name): void
     {
        $this->name = $name;
     }




     /**
      * @return mixed
     */
     public function getName()
     {
          return $this->name;
     }



     /**
      * @param mixed $children
     */
     public function setChildren($children): void
     {
          $this->children = $children;
     }




     /**
      * @return mixed
     */
     public function getChildren()
     {
          return $this->children;
     }




     /**
      * @param Category $child
      * @return void
     */
     public function addChild(Category $child)
     {
          if (! $this->children->contains($child)) {
                $this->children[] = $child;
          }
     }




     /**
      * @return mixed
     */
     public function getParent()
     {
         return $this->parent;
     }


     /**
      * @param Category $parent
     */
     public function setParent(Category $parent): void
     {
          $parent->addChild($this);

          $this->parent = $parent;
     }
}

```