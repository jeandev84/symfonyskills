<?php
namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use ApiPlatform\Core\Annotation\ApiSubresource;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;



/**
 * A manufacturer
 *
 * @ORM\Entity
*/
#[ApiResource(
    collectionOperations: ['get', 'post'],
    itemOperations: ['get', 'put', 'patch'],
    attributes: ["pagination_items_per_page" => 5]
)]
class Manufacturer
{
      /**
       * The id of the manufacturer
       *
       * @ORM\Id
       * @ORM\GeneratedValue
       * @ORM\Column(type="integer")
      */
      private ?int $id = null;


      /**
       * The name of the manufacturer
       *
       * @ORM\Column(type="string")
      */
      #[
          Assert\NotBlank,
          Groups(['product.read'])
      ]
      private string $name = '';




      /**
       * The description of the manufacturer
       *
       * @ORM\Column(type="text")
      */
      #[Assert\NotBlank]
      private string $description = '';




      /**
       * The country code of the manufacturer
       *
       * @ORM\Column(length=3)
      */
      #[Assert\NotBlank]
      private string $countryCode = '';




      /**
       * The date that the manufacturer was listed
       *
       * @ORM\Column(type="datetime")
      */
      #[Assert\NotNull]
      private ?\DateTimeInterface $listedDate = null;




      /**
       * @var Product[] Available products from this manufacturer
       *
       * @ORM\OneToMany(
       *     targetEntity="Product",
       *     mappedBy="manufacturer",
       *     cascade={"persist", "remove"}
       * )
      */
      #[ApiSubresource]
      private iterable $products;




      public function __construct()
      {
           $this->products = new ArrayCollection();
      }




      /**
       * @return int|null
      */
      public function getId(): ?int
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
       * @return string
      */
      public function getDescription(): string
      {
          return $this->description;
      }


      /**
       * @param string $description
      */
      public function setDescription(string $description): void
      {
           $this->description = $description;
      }




      /**
       * @return string
      */
      public function getCountryCode(): string
      {
           return $this->countryCode;
      }


      /**
       * @param string $countryCode
      */
      public function setCountryCode(string $countryCode): void
      {
           $this->countryCode = $countryCode;
      }



      /**
       * @return \DateTimeInterface|null
      */
      public function getListedDate(): ?\DateTimeInterface
      {
           return $this->listedDate;
      }



      /**
       * @param \DateTimeInterface|null $listedDate
      */
      public function setListedDate(?\DateTimeInterface $listedDate): void
      {
           $this->listedDate = $listedDate;
      }



      /**
       * @return iterable|ArrayCollection
      */
      public function getProducts(): iterable|ArrayCollection
      {
          return $this->products;
      }
}