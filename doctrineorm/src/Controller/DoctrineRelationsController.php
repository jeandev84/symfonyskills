<?php
namespace App\Controller;

use App\Entity\Address;
use App\Entity\Cart;
use App\Entity\Category;
use App\Entity\Customer;
use App\Entity\Manufacturer;
use App\Entity\Product;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class DoctrineRelationsController extends AbstractController
{

       public function __construct(private EntityManagerInterface $entityManager)
       {
       }



       /**
        * @Route("/one-to-many-bi-directional")
        * @return Response
       */
       public function oneToManyBiDirectional(): Response
       {
              /*
              $manufacturer = new Manufacturer();
              $manufacturer->setName('ACME');

              $entityManager->persist($manufacturer);
              $entityManager->flush();
              */

              /** @var Manufacturer $manufacturer */
              $manufacturer = $this->entityManager->find(Manufacturer::class, 1);
              // dd($manufacturer->getProducts()); // Doctrine\ORM\PersistentCollection()


              $product = new Product();
              $product->setName('Radio knob');
              $product->setManufacturer($manufacturer);
              $this->entityManager->persist($product);

              // dd($entityManager->contains($manufacturer), $entityManager->contains($product));


              return new Response(sprintf('Product record created with id %d', $manufacturer->getId()));
       }




       /**
        * @Route("/many-to-one-uni-directional")
        * @return Response
       */
       public function mayToOneUniDirectional(): Response
       {
             $address = new Address();
             $address->setNumber(22);
             $address->setStreet('Acacia Avenue');
             $this->entityManager->persist($address);

             $user = new User();
             $user->setAddress($address);
             $this->entityManager->persist($user);

             $this->entityManager->flush();


             return new Response(sprintf('Address record created with id %d and User record created with id %d', $address->getId(), $user->getId()));
       }






       /**
        * @Route("/one-to-many-self-joining")
        * @return Response
       */
       public function oneToManySelfJoining()
       {

              // [$parent, $child] = $this->createParentCategoryAndChildWithoutCascade($this->entityManager);


              [$parent, $child] = $this->createParentCategoryAndChildCascade($this->entityManager);


               return new Response(sprintf('Parent Category record created with id %d and child
               Category record created with id %d', $parent->getId(), $child->getId()));
       }




       /**
        * @Route("/one-to-one")
        * @return Response
       */
       public function oneToOne()
       {
             $custommer = new Customer();
             $this->entityManager->persist($custommer);

             $cart = new Cart();
             $cart->setCustomer($custommer);
             $this->entityManager->persist($cart);

             $this->entityManager->flush();

             return new Response(
                 sprintf('Customer record created with id %d and Cart record created with id %d', $custommer->getId(), $cart->getId())
             );
       }


       /**
        * @Route("/one-to-one-self-joining")
        * @return void
       */
       public function oneToOneSelfJoining()
       {

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