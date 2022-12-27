<?php
namespace App\DTO\Contracts;


interface PriceEnquiryInterface extends PromotionEnquiryInterface
{

      /**
       * @param int $price
       * @return mixed
      */
      public function setPrice(int $price);



      /**
       * @param int $discountedPrice
       * @return mixed
      */
      public function setDiscountedPrice(int $discountedPrice);




      /**
       * @return int|null
      */
      public function getQuantity(): ?int;
}