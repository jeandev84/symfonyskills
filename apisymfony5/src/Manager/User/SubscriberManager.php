<?php
namespace App\Manager\User;

use Doctrine\ORM\EntityManagerInterface;

class SubscriberManager
{
    public function __construct(protected EntityManagerInterface $entityManager)
    {
    }
}
