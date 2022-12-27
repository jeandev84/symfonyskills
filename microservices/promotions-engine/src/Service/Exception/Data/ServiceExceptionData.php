<?php
namespace App\Service\Exception\Data;

class ServiceExceptionData
{

       /**
        * @param int $statusCode
        * @param string $type
       */
       public function __construct(protected int $statusCode, protected string $type)
       {
       }



       /**
         * @return int
       */
       public function getStatusCode(): int
       {
            return $this->statusCode;
       }




      /**
       * @return string
      */
      public function getType(): string
      {
           return $this->type;
      }




      /**
       * @return array
      */
      public function toArray(): array
      {
          return [
              'type'        => $this->getType(),
              'violations'  => [
                  [
                      'propertyPath' => 'quantity',
                      'message'      => 'This value should be positive'
                  ]
              ]
          ];
      }




//    public function toArrayPlainFormat(): array
//    {
//        return [
//            'type'        => 'ConstraintViolationList',
//            'title'       => 'An error occurred',
//            'description' => 'This value should be positive',
//            'violations'  => [
//                [
//                    'propertyPath' => 'quantity',
//                    'message'      => 'This value should be positive'
//                ]
//            ]
//        ];
//    }


}