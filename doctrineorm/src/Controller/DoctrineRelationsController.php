<?php
namespace App\Controller;

use App\Entity\Address;
use App\Entity\Category;
use App\Entity\Manufacturer;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DoctrineRelationsController extends AbstractController
{
       /**
        * @Route("/one-to-many-bi-directional")
        * @param EntityManagerInterface $entityManager
        * @return Response
       */
       public function oneToManyBiDirectional(EntityManagerInterface  $entityManager): Response
       {
              /*
              $manufacturer = new Manufacturer();
              $manufacturer->setName('ACME');

              $entityManager->persist($manufacturer);
              $entityManager->flush();
              */

              /** @var Manufacturer $manufacturer */
              $manufacturer = $entityManager->find(Manufacturer::class, 1);
              // dd($manufacturer->getProducts()); // Doctrine\ORM\PersistentCollection()


              $product = new Product();
              $product->setName('Radio knob');
              $product->setManufacturer($manufacturer);
              $entityManager->persist($product);

              // dd($entityManager->contains($manufacturer), $entityManager->contains($product));


              return new Response(sprintf('Product record created with id %d', $manufacturer->getId()));
       }




       /**
        * @Route("/many-to-one-uni-directional")
        * @param EntityManagerInterface $entityManager
        * @return Response
       */
       public function mayToOneUniDirectional(EntityManagerInterface  $entityManager): Response
       {
             $address = new Address();
             $address->setNumber(22);
             $address->setStreet('Acacia Avenue');
             $entityManager->persist($address);

             $user = new User();
             $user->setAddress($address);
             $entityManager->persist($user);

             $entityManager->flush();


             return new Response(sprintf('Address record created with id %d and User record created with id %d', $address->getId(), $user->getId()));
       }






       /**
        * @Route("/one-to-many-self-joining")
        * @param EntityManagerInterface $entityManager
        * @return Response
       */
       public function oneToManySelfJoining(EntityManagerInterface $entityManager)
       {

              // [$parent, $child] = $this->createParentCategoryAndChildWithoutCascade($entityManager);


              [$parent, $child] = $this->createParentCategoryAndChildCascade($entityManager);


               return new Response(sprintf('Parent Category record created with id %d and child
               Category record created with id %d', $parent->getId(), $child->getId()));
       }





       /**
        * In this case Child and Parent will be created one by one
        *
        * @param EntityManagerInterface $entityManager
        * @return array
       */
       protected function createParentCategoryAndChildWithoutCascade(EntityManagerInterface $entityManager): array
       {
             # $children: @ORM\OneToMany(targetEntity="Category", mappedBy="parent")
             $parent = new Category('Parent');
             $entityManager->persist($parent);

             $child = new Category('Child 1');
             $child->setParent($parent);
             $entityManager->persist($child);

             $entityManager->flush();

             return [$parent, $child];

       }



       /**
        * In this case Child will be automatically persisted because "persistence is cascade"
        *
        * @param EntityManagerInterface $entityManager
        * @return array
       */
       protected function createParentCategoryAndChildCascade(EntityManagerInterface $entityManager): array
       {
            # $children: @ORM\OneToMany(targetEntity="Category", mappedBy="parent", cascade={"persist"})
            $parent = new Category('Parent 2');


            $child = new Category('Child 2');
            $child->setParent($parent);

            $entityManager->persist($parent);
            $entityManager->flush();

            return [$parent, $child];

       }
}