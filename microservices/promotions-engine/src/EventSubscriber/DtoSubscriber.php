<?php
namespace App\EventSubscriber;

use App\Event\AfterDtoCreatedEvent;
use App\Service\Exception\Data\ServiceExceptionData;
use App\Service\Exception\Data\ValidationExceptionData;
use App\Service\Exception\ServiceException;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\Validator\ConstraintViolationList;
use Symfony\Component\Validator\Validator\ValidatorInterface;

/* use Symfony\Component\Validator\Exception\ValidationFailedException; */



class DtoSubscriber implements EventSubscriberInterface
{


    /**
     * @param ValidatorInterface $validator
    */
    public function __construct(private ValidatorInterface $validator)
    {
    }



    /**
     * @inheritDoc
    */
    public static function getSubscribedEvents(): array
    {
         /*
         return [
             AfterDtoCreatedEvent::NAME => [
                 ['validateDto', 1], // priority (1) position
                 ['doSomethingElse', 100] // priority (100) position
             ]
         ];
         */

         return [
            AfterDtoCreatedEvent::NAME => 'validateDto'
         ];
    }




    /**
     * Validate DTO
     *
     * @param AfterDtoCreatedEvent $event
     * @return void
    */
    public function validateDto(AfterDtoCreatedEvent $event): void
    {
         // Validate the dto
         $dto = $event->getDto();

         /** @var ConstraintViolationList $errors */
         $errors = $this->validator->validate($dto);

         if (count($errors) > 0) {

              /*
               throw new ValidationFailedException('Validation failed', $errors);
               $validationExceptionData = new ServiceExceptionData(422, 'ConstraintViolationList');
              */

              $validationExceptionData = new ValidationExceptionData(422, 'ConstraintViolationList', $errors);

              throw new ServiceException($validationExceptionData);
         }
    }





    /**
     * @return void
    */
    public function doSomethingElse()
    {
         dd('doing something else');
    }
}