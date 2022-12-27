<?php
namespace App\Service\Exception;

use App\Service\Exception\Data\ServiceExceptionData;
use Symfony\Component\HttpKernel\Exception\HttpException;

class ServiceException extends HttpException
{

     /**
      * @var ServiceExceptionData
     */
     private ServiceExceptionData $exceptionData;


     /**
      * @param ServiceExceptionData $exceptionData
     */
     public function __construct(ServiceExceptionData $exceptionData)
     {
         $statusCode = $exceptionData->getStatusCode();
         $message    = $exceptionData->getType();

         parent::__construct($statusCode, $message);

         $this->exceptionData = $exceptionData;
     }


     /**
      * @return ServiceExceptionData
     */
     public function getExceptionData(): ServiceExceptionData
     {
        return $this->exceptionData;
     }
}