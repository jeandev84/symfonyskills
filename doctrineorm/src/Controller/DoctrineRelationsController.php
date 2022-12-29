<?php
namespace App\Controller;

use App\Entity\Manufacturer;
use App\Entity\Product;
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
              dd($manufacturer->getProducts()); // Doctrine\ORM\PersistentCollection()


              $product = new Product();
              $product->setName('Radio knob');
              $product->setManufacturer($manufacturer);
              $entityManager->persist($product);

              dd($entityManager->contains($manufacturer), $entityManager->contains($product));


              return new Response(sprintf('Manufacturer record created with id %d', $manufacturer->getId()));
       }
}