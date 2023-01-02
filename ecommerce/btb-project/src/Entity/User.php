<?php
namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;


/**
 * @ORM\Entity
 * @ORM\Table(name="users")
*/
class User
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
     private $username;



     /**
      * @ORM\Column(type="string")
     */
     private $password;



     /**
      * @ORM\Column(type="datetime", name="created_at")
      * @var \DateTimeInterface
     */
     private $createdAt;



     public function __construct()
     {
          $this->createdAt = new \DateTime();
     }



    /**
      * @return mixed
     */
     public function getId()
     {
          return $this->id;
     }



     /**
      * @param string $username
     */
     public function setUsername(string $username): void
     {
         $this->username = $username;
     }




     /**
      * @return string|null
     */
     public function getUsername(): ?string
     {
         return $this->username;
     }




     /**
      * @param string|null $password
     */
     public function setPassword(?string $password): void
     {
          $this->password = $password;
     }




     /**
      * @return string|null
     */
     public function getPassword(): ?string
     {
          return $this->password;
     }




     /**
      * @param \DateTimeInterface|null $createdAt
     */
     public function setCreatedAt(?\DateTimeInterface $createdAt): void
     {
          $this->createdAt = $createdAt;
     }




     /**
      * @return \DateTimeInterface
     */
     public function getCreatedAt(): ?\DateTimeInterface
     {
          return $this->createdAt;
     }
}