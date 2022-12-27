<?php
namespace App\Filter\Contracts;

use App\DTO\Contracts\PriceEnquiryInterface;
use App\Entity\Promotion;


interface PriceFilterInterface extends PromotionsFilterInterface
{

    /**
     * @param PriceEnquiryInterface $enquiry
     * @param Promotion ...$promotions
     * @return PriceEnquiryInterface
     */
    public function apply(PriceEnquiryInterface $enquiry, Promotion ...$promotions): PriceEnquiryInterface;
}