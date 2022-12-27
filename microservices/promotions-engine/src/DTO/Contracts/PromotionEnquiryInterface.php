<?php
namespace App\DTO\Contracts;

use App\Entity\Product;

interface PromotionEnquiryInterface /* extends \JsonSerializable */
{

      /**
       * @return Product|null
      */
      public function getProduct(): ?Product;




      /**
       * @param int $promotionId
       * @return mixed
      */
      public function setPromotionId(int $promotionId);





      /**
       * @param string $promotionName
       * @return mixed
      */
      public function setPromotionName(string $promotionName);
}