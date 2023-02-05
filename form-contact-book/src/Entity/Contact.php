<?php
namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Bridge\Doctrine\Validator\Constraints\UniqueEntity;
use Symfony\Component\Validator\Constraints as Assert;
use App\Validator\Constraints as NewAssert;



#[ORM\Entity(repositoryClass: ContactRepository::class)]
#[UniqueEntity(fields: [
    "email"
], message: "Email {{ value }} is already used")]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    // #[NewAssert\CheckName()]
    private ?string $lastName = null;

    #[ORM\Column(length: 255)]
    // #[NewAssert\CheckName()]
    private ?string $firstName = null;

    #[ORM\Column(length: 255)]
    #[Assert\Length(
        min: 12,
        max: 12,
        exactMessage: 'Phone number should have exactly {{ limit }} characters'
    )]
    private ?string $phoneNumber = null;

    #[ORM\Column(length: 255)]
    #[Assert\Email(
        message: "The email '{{ value }}' is not a valid email"
    )]
    private ?string $email = null;

    #[ORM\Column(length: 255, nullable: true)]
    private ?string $notes = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): self
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phoneNumber;
    }

    public function setPhoneNumber(string $phoneNumber): self
    {
        $this->phoneNumber = $phoneNumber;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }


    /**
     * @return string|null
    */
    public function getNotes(): ?string
    {
        return $this->notes;
    }


    /**
     * @param string|null $notes
     * @return $this
    */
    public function setNotes(?string $notes): self
    {
        $this->notes = $notes;

        return $this;
    }
}
