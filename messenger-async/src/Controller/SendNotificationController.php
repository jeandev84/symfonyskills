<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\NotifyUserFormType;
use App\Message\UserNotificationMessage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use App\Service\UserNotifierService;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Messenger\MessageBusInterface;
use Symfony\Component\Routing\Annotation\Route;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class SendNotificationController extends AbstractController
{


       /**
        * @Route("/send-message", name="send.message")
        * @param Request $request
        * @param MessageBusInterface $messageBus
        * @return RedirectResponse|Response
      */
      public function index(Request $request, MessageBusInterface $messageBus)
      {
            $form = $this->createForm(NotifyUserFormType::class, new User());
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $user = $form->getData();
                $messageBus->dispatch(new UserNotificationMessage($user->getId()));
                $this->addFlash('success', 'La notification a bien ete envoyer');
                return $this->redirectToRoute('home');
            }


            return $this->render('notification/index.html.twig', [
               'form' => $form->createView()
            ]);
      }
}