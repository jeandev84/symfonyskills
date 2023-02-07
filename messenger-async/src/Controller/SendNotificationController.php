<?php
namespace App\Controller;

use App\Entity\User;
use App\Form\NotifyUserFormType;
use App\Message\UserNotificationMessage;
use App\Repository\FailedJobRepository;
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
       * @param FailedJobRepository $failedJobRepository
       * @return RedirectResponse|Response
      */
      public function index(
          Request $request,
          MessageBusInterface $messageBus,
          FailedJobRepository $failedJobRepository
      )
      {
            $form = $this->createForm(NotifyUserFormType::class, new User(1));
            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {
                $user = $form->getData();
                $messageBus->dispatch(new UserNotificationMessage($user->getId()));
                $this->addFlash('success', 'La notification a bien ete envoyer');
                return $this->redirectToRoute('home');
            }


            return $this->render('notification/index.html.twig', [
               'form' => $form->createView(),
               'jobs' => $failedJobRepository->findAll()
            ]);
      }


      protected function deserializedMessage()
      {
          //  dd($this->deserializedMessage());
          // from table "messenger_messages
          return unserialize("O:36:\"Symfony\\Component\\Messenger\\Envelope\":2:{s:44:\"\0Symfony\\Component\\Messenger\\Envelope\0stamps\";a:1:{s:46:\"Symfony\\Component\\Messenger\\Stamp\\BusNameStamp\";a:1:{i:0;O:46:\"Symfony\\Component\\Messenger\\Stamp\\BusNameStamp\":1:{s:55:\"\0Symfony\\Component\\Messenger\\Stamp\\BusNameStamp\0busName\";s:21:\"messenger.bus.default\";}}}s:45:\"\0Symfony\\Component\\Messenger\\Envelope\0message\";O:35:\"App\\Message\\UserNotificationMessage\":1:{s:9:\"\0*\0userId\";i:1;}} ");
      }
}