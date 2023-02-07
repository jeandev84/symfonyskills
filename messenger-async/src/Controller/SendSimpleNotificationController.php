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


class SendSimpleNotificationController extends AbstractController
{


      /**
       * @Route("/notification/send", name="send.message")
       *
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





      /**
       * @Route("/notification/delete/{id}", name="delete.failed.messages", methods={"DELETE"})
       *
       * @param int $id
       * @param FailedJobRepository $failedJobRepository
       * @return RedirectResponse
      */
      public function delete(int $id, FailedJobRepository $failedJobRepository): RedirectResponse
      {
           $failedJobRepository->reject($id);
           $this->addFlash('success', 'La tache a bien ete supprimee');
           return $this->redirectToRoute('home');
      }


      /**
       * @Route("/notification/retry/{id}", name="retry.failed.messages", methods={"POST"})
       *
       * @param int $id
       * @param FailedJobRepository $failedJobRepository
       * @param MessageBusInterface $messageBus
       * @return RedirectResponse
      */
      public function retry(int $id, FailedJobRepository $failedJobRepository, MessageBusInterface $messageBus): RedirectResponse
      {
          $message = $failedJobRepository->find($id)->getMessage();
          $messageBus->dispatch($message);
          $failedJobRepository->reject($id);
          $this->addFlash('success', 'La tache a bien ete ressayer');
          return $this->redirectToRoute('home');
      }
}