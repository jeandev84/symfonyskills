<?php
namespace App\Controller;

use App\Entity\InterestGroup;
use App\Entity\Membership;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class AppController extends AbstractController
{

       #[Route('/', 'home')]
       public function index(EntityManagerInterface $entityManager)
       {
            // Create a group
            $group = new InterestGroup();
            $group->setName('NYC Kung Fu Group');
            $entityManager->persist($group);


            // Create a user
            $user = new User();
            $user->setName('Jane Doe');
            $entityManager->persist($user);


            // Create a membership between the user and the group
             $groupMembership = new Membership();
             $groupMembership->setCreatedAt(date_create());
             // $groupMembership->setLevel('ultimo!');
             $groupMembership->setLevel('better');
             $groupMembership->setInterestGroup($group);
             $groupMembership->setMember($user);

             $entityManager->persist($groupMembership);
             $entityManager->flush();

             return new Response("Members {$groupMembership->getId()} created 
                                         for user {$user->getId()} and group {$group->getId()}");
       }
}