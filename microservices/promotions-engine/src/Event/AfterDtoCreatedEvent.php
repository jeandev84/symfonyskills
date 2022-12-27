<?php
namespace App\Event;

use App\DTO\Contracts\PromotionEnquiryInterface;
use Symfony\Contracts\EventDispatcher\Event;

class AfterDtoCreatedEvent extends Event
{
      public const NAME = 'dto.created'; // what.doing


      /**
       * @param PromotionEnquiryInterface $dto
      */
      public function __construct(protected PromotionEnquiryInterface $dto)
      {
      }




      /**
       * @return PromotionEnquiryInterface
      */
      public function getDto(): PromotionEnquiryInterface
      {
           return $this->dto;
      }
}