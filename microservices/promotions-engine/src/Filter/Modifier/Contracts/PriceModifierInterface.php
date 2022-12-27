<?php
namespace App\Filter\Modifier\Contracts;

use App\DTO\Contracts\PromotionEnquiryInterface;
use App\Entity\Promotion;

interface PriceModifierInterface
{

      /**
       * @param int $price
       * @param int $quantity
       * @param Promotion $promotion
       * @param PromotionEnquiryInterface $enquiry
       * @return int
      */
      public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int;
}