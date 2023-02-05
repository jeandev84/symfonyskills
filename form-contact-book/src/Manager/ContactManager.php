<?php
namespace App\Manager;

use App\Entity\Contact;
use App\Factory\ContactFactory;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Form\FormInterface;

class ContactManager
{

      /**
       * @var EntityManagerInterface
      */
      protected EntityManagerInterface $entityManager;


      /**
       * @param EntityManagerInterface $entityManager
      */
      public function __construct(EntityManagerInterface $entityManager)
      {
           $this->entityManager = $entityManager;
      }


      /**
       * @param Contact $contact
       * @return Contact
      */
      public function saveContact(Contact $contact): Contact
      {
           $this->entityManager->persist($contact);
           $this->entityManager->flush();

           return $contact;
      }


     /**
      * @param FormInterface $form
      * @return Contact
     */
     public function saveContactFromForm(FormInterface $form): Contact
     {
          return $this->saveContact(ContactFactory::createFromForm($form));
     }



     /**
      * @param Contact $contact
      * @return Contact
     */
     public function deleteContact(Contact $contact): Contact
     {
          $this->entityManager->remove($contact);
          $this->entityManager->flush();

          return $contact;
     }




     public function deleteContactsByIds(array $contactIds): bool
     {
           // BAD WAY !!!
           // todo DELETE FROM contact WHERE ids IN (:contactIds)
           foreach ($contactIds as $contactId) {
                if ($contact = $this->findContactById($contactId)) {
                     $this->deleteContact($contact);
                }
           }

           return true;
     }


     /**
      * @return Contact[]
     */
     public function findAllContacts(): array
     {
           $repository = $this->entityManager->getRepository(Contact::class);

           return $repository->findAll();
     }


     /**
      * @param int $id
      * @return Contact|null
     */
     public function findContactById(int $id): ?Contact
     {
         $repository = $this->entityManager->getRepository(Contact::class);

         if (! $contact = $repository->find($id)) {
               return null;
         }

         return $contact;
     }


     public function contactToArray(Contact $contact): array
     {
          // This is a bad way
          return [
              'id'          => $contact->getId(),
              'lastName'    => $contact->getLastName(),
              'firstName'   => $contact->getFirstName(),
              'phoneNumber' => $contact->getPhoneNumber(),
              'email'       => $contact->getEmail(),
              'notes'       => $contact->getNotes()
          ];
     }
}