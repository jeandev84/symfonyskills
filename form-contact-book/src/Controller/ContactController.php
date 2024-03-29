<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactFormType;
use App\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{

      protected ContactManager $contactManager;


      /**
       * @param ContactManager $contactManager
      */
      public function __construct(ContactManager $contactManager)
      {
           $this->contactManager = $contactManager;
      }



      #[Route(path: '/', name: 'home')]
      public function mainPage(): RedirectResponse
      {
          return $this->redirectToRoute('contacts.list');
      }


      #[Route(path: '/contacts', name: 'contacts.list')]
      public function listContacts(): Response
      {
           return $this->render("contact/list.html.twig", [
              'contacts' => $this->contactManager->findAllContacts()
           ]);
      }



      #[Route(path: '/contacts/{id}', name: 'contacts.show')]
      public function showContact(Contact $contact): Response
      {
         return $this->render("contact/show.html.twig", compact('contact'));
     }



      #[Route(path: '/contacts/create', name: 'contacts.create')]
      public function createContact(Request $request): Response
      {
          $contact = new Contact();

          $form = $this->createForm(ContactFormType::class, $contact);

          $form->handleRequest($request);

          if ($form->isSubmitted() && $form->isValid()) {

               $this->contactManager->saveContactFromForm($form);

               $this->addFlash('success', "User was successfully created!");

               return $this->redirectToRoute("contacts.list");
          }

          return $this->renderForm('contact/form.html.twig', compact('form'));
      }




      #[Route(path: '/contacts/update/{id}', name: "contacts.update")]
      public function updateContact(Request $request, Contact $contact): RedirectResponse|Response
      {
            $form = $this->createForm(ContactFormType::class, $contact);

            $form->handleRequest($request);

            if ($form->isSubmitted() && $form->isValid()) {

               $this->contactManager->saveContactFromForm($form);

               $this->addFlash('success', "User {$contact->getLastName()} was successfully updated!");

               return $this->redirectToRoute("contacts.list");
           }

           return $this->renderForm('contact/form.html.twig', compact('form'));
      }



      #[Route(path: '/contacts/delete/{id}', name: 'contacts.delete')]
      public function deleteContact(Contact $contact): Response
      {
          $this->contactManager->deleteContact($contact);

          return $this->redirectToRoute('contacts.list');
      }




      #[Route(path: '/contacts/rows/delete', name: 'contacts.rows.delete', methods: ['POST'])]
      public function deleteContactCollections(Request $request): RedirectResponse
      {
          $contactIds = $request->get('contactIds');

          $this->contactManager->deleteContactsByIds($contactIds);

          $this->addFlash('success', "Users was successfully deleted!");

          return $this->redirectToRoute('contacts.list');
      }
}