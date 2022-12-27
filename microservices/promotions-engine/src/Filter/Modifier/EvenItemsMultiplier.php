<?php
namespace App\Filter\Modifier;

use App\DTO\Contracts\PromotionEnquiryInterface;
use App\Entity\Promotion;
use App\Filter\Modifier\Contracts\PriceModifierInterface;

class EvenItemsMultiplier implements PriceModifierInterface
{

    /**
     * @inheritDoc
    */
    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {
         if ($quantity < 2) {
              return $price * $quantity;
         }

         // Get the odd item ... if there is one
         $oddCount = $quantity % 2; // 0 or 1


         // Count how many even items
         $evenCount = $quantity - $oddCount; // deduct either 0 or 1.


         // (($evenCount * $price) * $adjustment) + ($oddCount * $price)
         return (($evenCount * $price) * $promotion->getAdjustment()) + ($oddCount * $price);
    }
}