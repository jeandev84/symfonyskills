<?php
namespace App\Filter\Modifier;

use App\DTO\Contracts\PromotionEnquiryInterface;
use App\Entity\Promotion;
use App\Filter\Modifier\Contracts\PriceModifierInterface;

class FixedPriceVoucher implements PriceModifierInterface
{

    /**
     * @inheritDoc
    */
    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {
          if(! $enquiry->getVoucherCode() === $promotion->getCriteria()['code']) {
                return $price * $quantity;
          }

          // Example: 100 * 5
          return $promotion->getAdjustment() * $quantity;
    }
}