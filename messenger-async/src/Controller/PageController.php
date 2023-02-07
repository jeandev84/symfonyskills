<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\NotifyUserFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\UserNotifierService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class PageController extends AbstractController
{

     /**
      * @Route("/", name="home")
      * @param Request $request
      * @param UserNotifierService $notifierService
      * @return RedirectResponse|Response
      * @throws TransportExceptionInterface
      * @throws LoaderError
      * @throws RuntimeError
      * @throws SyntaxError
     */
     public function index(Request $request, UserNotifierService $notifierService)
     {
            /* $form = $this->createForm(NotifyUserFormType::class, []); */
            $form = $this->createForm(NotifyUserFormType::class, new User(1));
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $user = $form->getData();
                $notifierService->notify($user);
                $this->addFlash('success', 'La notification a bien ete envoyer');
                return $this->redirectToRoute('home');
            }


            return $this->render('page/index.html.twig', [
               'form' => $form->createView()
            ]);
     }
}