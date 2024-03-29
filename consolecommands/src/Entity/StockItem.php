<?php
namespace App\Entity;

use App\Repository\StockItemRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: StockItemRepository::class)]
class StockItem
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $itemNumber = null;

    #[ORM\Column(length: 255)]
    private ?string $itemName = null;

    #[ORM\Column(type: Types::TEXT, nullable: true)]
    private ?string $itemDescription = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $supplierCost = null;

    #[ORM\Column(type: Types::DECIMAL, precision: 10, scale: 2)]
    private ?string $price = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getItemNumber(): ?string
    {
        return $this->itemNumber;
    }

    public function setItemNumber(string $itemNumber): self
    {
        $this->itemNumber = $itemNumber;

        return $this;
    }

    public function getItemName(): ?string
    {
        return $this->itemName;
    }

    public function setItemName(string $itemName): self
    {
        $this->itemName = $itemName;

        return $this;
    }

    public function getItemDescription(): ?string
    {
        return $this->itemDescription;
    }

    public function setItemDescription(?string $itemDescription): self
    {
        $this->itemDescription = $itemDescription;

        return $this;
    }

    public function getSupplierCost(): ?string
    {
        return $this->supplierCost;
    }

    public function setSupplierCost(string $supplierCost): self
    {
        $this->supplierCost = $supplierCost;

        return $this;
    }

    public function getPrice(): ?string
    {
        return $this->price;
    }

    public function setPrice(string $price): self
    {
        $this->price = $price;

        return $this;
    }
}
