<?php
namespace App\Controller;

use App\Entity\Contact;
use App\Form\Type\ContactFormType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;


class ContactController extends AbstractController
{

      #[Route(path: '/contacts/create', name: 'contacts.create')]
      public function createContact(): Response
      {
          $contact = new Contact();

          $form = $this->createForm(ContactFormType::class, $contact);

          return $this->renderForm('contact/form.html.twig', compact('form'));
      }
}