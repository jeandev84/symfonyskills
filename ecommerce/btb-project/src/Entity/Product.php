<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="products")
*/
class Product
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
     * @ORM\Column(type="text")
    */
    private $description;



    /**
     * @ORM\Column(type="integer")
    */
    private $price;




    /**
     * @ORM\Column(type="datetime", name="created_at")
     * @var \DateTimeInterface
    */
    private $createdAt;




    public function __construct()
    {
         $this->createdAt = new \DateTimeImmutable();
    }



    /**
     * @return mixed
    */
    public function getId()
    {
        return $this->id;
    }


    /**
     * @param string|null $name
    */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }




    /**
     * @return string|null
    */
    public function getName(): ?string
    {
        return $this->name;
    }


    /**
     * @param string|null $description
    */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }




    /**
     * @return string|null
    */
    public function getDescription(): ?string
    {
        return $this->description;
    }


    /**
     * @param int|null $price
    */
    public function setPrice(?int $price): void
    {
        $this->price = $price;
    }




    /**
     * @return int|null
    */
    public function getPrice(): ?int
    {
        return $this->price;
    }


    /**
     * @param \DateTimeInterface|null $createdAt
    */
    public function setCreatedAt(?\DateTimeInterface $createdAt): void
    {
        $this->createdAt = $createdAt;
    }




    /**
     * @return \DateTimeInterface|null
    */
    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }
}