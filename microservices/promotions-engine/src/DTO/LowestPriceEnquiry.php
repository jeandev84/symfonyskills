<?php
namespace App\DTO;

use App\DTO\Contracts\PriceEnquiryInterface;
use App\Entity\Product;
use Symfony\Component\Serializer\Annotation\Ignore;
use Symfony\Component\Validator\Constraints as Assert;



class LowestPriceEnquiry implements PriceEnquiryInterface
{

    #[Ignore]
    private ?Product $product;


    #[Assert\NotBlank]
    #[Assert\Positive]
    private ?int $quantity = 1;



    private ?string $requestLocation;

    private ?string $voucherCode;

    #[Assert\NotBlank]
    private ?string $requestDate;

    #[Assert\Positive]
    private ?int $price;

    private ?int $discountedPrice;

    private ?int $promotionId;

    private ?string $promotionName;



    /**
     * @return Product|null
    */
    public function getProduct(): ?Product
    {
        return $this->product;
    }




    /**
     * @param Product|null $product
     * @return LowestPriceEnquiry
    */
    public function setProduct(?Product $product): LowestPriceEnquiry
    {
        $this->product = $product;

        return $this;
    }



    /**
     * @return int|null
    */
    public function getQuantity(): ?int
    {
        return $this->quantity;
    }




    /**
     * @param int|null $quantity
     * @return LowestPriceEnquiry
    */
    public function setQuantity(?int $quantity): LowestPriceEnquiry
    {
        $this->quantity = $quantity;

        return $this;
    }




    /**
     * @return string|null
    */
    public function getRequestLocation(): ?string
    {
        return $this->requestLocation;
    }




    /**
     * @param string|null $requestLocation
     * @return LowestPriceEnquiry
    */
    public function setRequestLocation(?string $requestLocation): LowestPriceEnquiry
    {
        $this->requestLocation = $requestLocation;

        return $this;
    }




    /**
     * @return string|null
    */
    public function getVoucherCode(): ?string
    {
        return $this->voucherCode;
    }




    /**
     * @param string|null $voucherCode
     * @return LowestPriceEnquiry
    */
    public function setVoucherCode(?string $voucherCode): LowestPriceEnquiry
    {
        $this->voucherCode = $voucherCode;

        return $this;
    }

    /**
     * @return string|null
     */
    public function getRequestDate(): ?string
    {
        return $this->requestDate;
    }



    /**
     * @param string|null $requestDate
     * @return LowestPriceEnquiry
    */
    public function setRequestDate(?string $requestDate): LowestPriceEnquiry
    {
        $this->requestDate = $requestDate;
        return $this;
    }




    /**
     * @return int|null
    */
    public function getPrice(): ?int
    {
        return $this->price;
    }




    /**
     * @param int|null $price
     * @return LowestPriceEnquiry
    */
    public function setPrice(?int $price): LowestPriceEnquiry
    {
        $this->price = $price;

        return $this;
    }




    /**
     * @return int|null
    */
    public function getDiscountedPrice(): ?int
    {
        return $this->discountedPrice;
    }




    /**
     * @param int|null $discountedPrice
     * @return LowestPriceEnquiry
    */
    public function setDiscountedPrice(?int $discountedPrice): LowestPriceEnquiry
    {
        $this->discountedPrice = $discountedPrice;

        return $this;
    }





    /**
     * @return int|null
    */
    public function getPromotionId(): ?int
    {
        return $this->promotionId;
    }




    /**
     * @param int|null $promotionId
     * @return LowestPriceEnquiry
    */
    public function setPromotionId(?int $promotionId): LowestPriceEnquiry
    {
        $this->promotionId = $promotionId;

        return $this;
    }




    /**
     * @return string|null
    */
    public function getPromotionName(): ?string
    {
        return $this->promotionName;
    }



    /**
     * @param string|null $promotionName
     * @return LowestPriceEnquiry
    */
    public function setPromotionName(?string $promotionName): LowestPriceEnquiry
    {
        $this->promotionName = $promotionName;

        return $this;
    }

    /*
    public function jsonSerialize(): mixed
    {
         return get_object_vars($this);
    }
    */
}




/*
new JsonResponse([
    "quantity" => 5,
    "request_location" => "UK",
    "voucher_code" => "OU812",
    "request_date" => "2022-04-04",
    "product_id" => $id,
    "price" => 100,
    "discounted_price" => 50,
    "promotion_id" => 3,
    "promotion_name" => 'Black Friday half price sale',
])
*/