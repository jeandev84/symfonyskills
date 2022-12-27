<?php
namespace App\Tests\unit;

use App\DTO\LowestPriceEnquiry;
use App\Event\AfterDtoCreatedEvent;
use App\EventSubscriber\DtoSubscriber;
use App\Service\Exception\ServiceException;
use App\Tests\ServiceTestCase;
use Psr\EventDispatcher\EventDispatcherInterface;


class DtoSubscriberTest extends ServiceTestCase
{


     /**
       * @return void
     */
     public function testEventSubscription()
     {
          $this->assertArrayHasKey(AfterDtoCreatedEvent::NAME, DtoSubscriber::getSubscribedEvents());
     }




     /** @test */
     public function testValidateDto(): void
     {
           // Given
           $dto = new LowestPriceEnquiry();
           $dto->setQuantity(-5);


           $event = new AfterDtoCreatedEvent($dto);


           /** @var EventDispatcherInterface $dispatcher */
           $dispatcher = $this->container->get('debug.event_dispatcher');


           // Expect
           $this->expectException(ServiceException::class);
           $this->expectExceptionMessage('ConstraintViolationList');


           // When
           $dispatcher->dispatch($event, $event::NAME);
     }
}