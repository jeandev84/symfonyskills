<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactFormType;
use App\Manager\ContactManager;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{

      /**
       * @var ContactManager
      */
      protected $contactManager;


      /**
       * @param ContactManager $contactManager
      */
      public function __construct(ContactManager $contactManager)
      {
           $this->contactManager = $contactManager;
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
          }

          return $this->renderForm('contact/form.html.twig', compact('form'));
      }
}