<?php
namespace App\Filter\Modifier;

use App\DTO\Contracts\PromotionEnquiryInterface;
use App\Entity\Promotion;
use App\Filter\Modifier\Contracts\PriceModifierInterface;

class DateRangeMultiplier implements PriceModifierInterface
{

    /**
     * @inheritDoc
    */
    public function modify(int $price, int $quantity, Promotion $promotion, PromotionEnquiryInterface $enquiry): int
    {

         $requestDate = date_create($enquiry->getRequestDate());
         $from        = date_create($promotion->getCriteria()['from']);
         $to          = date_create($promotion->getCriteria()['to']);

         if (! ($requestDate >= $from && $requestDate < $to)) {
             return $price * $quantity;
         }

         // (price * quantity) * promotion->adjustment : example (250)
         return ($price * $quantity) * $promotion->getAdjustment();
    }
}