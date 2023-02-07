<?php
namespace App\Service;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Symfony\Component\Mailer\Exception\TransportExceptionInterface;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\Mime\Email;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class UserNotifierService
{


      /**
       * @var MailerInterface
      */
      protected MailerInterface $mailer;


      /**
       * @var Environment
      */
      protected Environment $twig;



      protected EntityManagerInterface $entityManager;


      /**
       * @param MailerInterface $mailer
       * @param Environment $twig
       * @param EntityManagerInterface $entityManager
      */
      public function __construct(
          MailerInterface $mailer,
          Environment $twig,
          EntityManagerInterface $entityManager
      )
      {
            $this->mailer = $mailer;
            $this->twig   = $twig;
            $this->entityManager = $entityManager;
      }




      /**
       * @throws SyntaxError
       * @throws TransportExceptionInterface
       * @throws RuntimeError
       * @throws LoaderError
      */
      public function notify(User $user)
      {
           $email = (new Email())
                    ->from('noreplay@site.fr')
                    ->to($user->getEmail())
                    ->html($this->twig->render('emails/notification.html.twig', compact('user')));

           sleep(2);

           throw new \Exception('Pas Possible');

           $this->mailer->send($email);
      }



      public function notifyUserById(int $userId)
      {
           $user = $this->entityManager->find(User::class, $userId);

           $email = (new Email())
                 ->from('noreplay@site.fr')
                 ->to($user->getEmail())
                 ->html($this->twig->render('emails/notification.html.twig', compact('user')));

           sleep(2);

           throw new \Exception('Pas Possible');

           $this->mailer->send($email);
      }


      /**
       * @param array $payload
       * @return void
       * @throws TransportExceptionInterface
      */
      public function notifyAdmin(array $payload)
      {
          $email = (new Email())
                   ->from('noreplay@site.fr')
                   ->to('administrator@server.fr')
                   ->text($payload['message']);

          $this->mailer->send($email);
      }
}