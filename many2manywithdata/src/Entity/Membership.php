<?php

namespace App\Entity;

use App\Repository\MembershipRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: MembershipRepository::class)]
class Membership
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $createdAt = null;

    #[ORM\Column(length: 255)]
    private ?string $level = null;


    #[ORM\ManyToOne(targetEntity: 'InterestGroup')]
    #[ORM\JoinColumn(nullable: false)]
    private ?InterestGroup $interestGroup;


    #[ORM\ManyToOne(targetEntity: 'User')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $member;



    private const MEMBERSHIP_LEVEL_TYPES = ['standard', 'better', 'best'];



    public function __construct()
    {
        $this->createdAt = date_create();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getLevel(): ?string
    {
        return $this->level;
    }

    public function setLevel(string $level): self
    {
        if (! in_array($level, self::MEMBERSHIP_LEVEL_TYPES)) {
              throw new \InvalidArgumentException('Level must be one of '. implode(', ', self::MEMBERSHIP_LEVEL_TYPES));
        }

        $this->level = $level;

        return $this;
    }


    /**
     * @param InterestGroup|null $interestGroup
     */
    public function setInterestGroup(?InterestGroup $interestGroup): void
    {
        $this->interestGroup = $interestGroup;
    }


    /**
     * @return InterestGroup|null
     */
    public function getInterestGroup(): ?InterestGroup
    {
        return $this->interestGroup;
    }


    /**
     * @param User|null $member
     */
    public function setMember(?User $member): void
    {
        $this->member = $member;
    }


    /**
     * @return User|null
     */
    public function getMember(): ?User
    {
        return $this->member;
    }
}
