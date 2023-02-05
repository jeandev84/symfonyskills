<?php
namespace App\Factory;

use App\Entity\Contact;
use Symfony\Component\Form\FormInterface;

class ContactFactory
{

      /**
       * @param FormInterface $form
       * @return Contact
      */
      public static function createFromForm(FormInterface $form): Contact
      {
           $contact = new Contact();
           $contact->setLastName($form->get('lastName')->getData());
           $contact->setFirstName($form->get('firstName')->getData());
           $contact->setPhoneNumber($form->get('phoneNumber')->getData());
           $contact->setEmail($form->get('email')->getData());
           $contact->setNotes($form->get('notes')->getData());

           return $contact;
      }
}