<?php
namespace App\Controller;

use App\Entity\Subscriber;
use App\Form\SubscriberFormType;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Environment;

class SubscriberController extends AbstractController
{
    #[Route('/show', name: 'app.show')]
    public function show(
        Environment $twig,
        Request $request,
        EntityManagerInterface $entityManager
    ): Response
    {
         $subscriber = new Subscriber();
         $form       = $this->createForm(SubscriberFormType::class, $subscriber);


         $form->handleRequest($request);

         $agreeTerms = $form->get('agreeTerms')->getData();

         if ($form->isSubmitted() && $form->isValid() && $agreeTerms) {

              $entityManager->persist($subscriber);
              $entityManager->flush();

              return new Response("Subscriber number {$subscriber->getId()} created..");
         }

         return new Response($twig->render('subscriber/show.html.twig', [
             'subscriber_form' => $form->createView()
         ]));
    }
}
