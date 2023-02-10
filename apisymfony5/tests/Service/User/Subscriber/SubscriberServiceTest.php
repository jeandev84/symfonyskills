<?php

namespace App\Tests\Service\User\Subscriber;

use App\DTO\Model\User\Subscriber\SubscriberRequest;
use App\Entity\User\Subscriber;
use App\Exception\User\Subscriber\SubscriberAlreadyExistsException;
use App\Repository\User\SubscriberRepository;
use App\Service\User\Subscriber\SubscriberService;
use App\Tests\AbstractTestCase;
use Doctrine\ORM\EntityManagerInterface;

class SubscriberServiceTest extends AbstractTestCase
{
    private SubscriberRepository $subscriberRepository;

    private EntityManagerInterface $em;

    private const EMAIL = 'test@test.com';

    protected function setUp(): void
    {
        parent::setUp();

        $this->subscriberRepository = $this->createMock(SubscriberRepository::class);
        $this->em = $this->createMock(EntityManagerInterface::class);
    }

    public function testSubscribeAlreadyExist(): void
    {
        $this->expectException(SubscriberAlreadyExistsException::class);

        $this->subscriberRepository->expects($this->once())
                                   ->method('existsByEmail')
                                   ->with(self::EMAIL)
                                   ->willReturn(true);


        $request = new SubscriberRequest();
        $request->setEmail(self::EMAIL);

        (new SubscriberService($this->subscriberRepository, $this->em))->subscribe($request);
    }

    public function testSubscribe(): void
    {
        $this->subscriberRepository->expects($this->once())
            ->method('existsByEmail')
            ->with(self::EMAIL)
            ->willReturn(false);

        $expectedSubscriber = new Subscriber();
        $expectedSubscriber->setEmail(self::EMAIL);


        $this->em->expects($this->once())
                 ->method('persist')
                 ->with($expectedSubscriber);


        $this->em->expects($this->once())
                 ->method('flush');

        $request = new SubscriberRequest();
        $request->setEmail(self::EMAIL);

        (new SubscriberService($this->subscriberRepository, $this->em))->subscribe($request);
    }


    protected function tearDown(): void
    {
        parent::tearDown();

        $this->em->close();
        // $this->entityManager = null;
    }
}
