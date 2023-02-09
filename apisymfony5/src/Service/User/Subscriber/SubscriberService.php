<?php

namespace App\Service\User\Subscriber;

use App\DTO\Model\User\Subscriber\SubscriberRequest;
use App\Entity\User\Subscriber;
use App\Exception\User\Subscriber\SubscriberAlreadyExistsException;
use App\Repository\User\SubscriberRepository;
use Doctrine\ORM\EntityManagerInterface;

class SubscriberService
{
    public function __construct(private SubscriberRepository $subscriberRepository, private EntityManagerInterface $entityManager)
    {
    }

    public function subscribe(SubscriberRequest $request): void
    {
        if ($this->subscriberRepository->existsByEmail($request->getEmail())) {
            throw new SubscriberAlreadyExistsException();
        }

        $subscriber = new Subscriber();
        $subscriber->setEmail($request->getEmail());

        $this->entityManager->persist($subscriber);
        $this->entityManager->flush();
    }
}
