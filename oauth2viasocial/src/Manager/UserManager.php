<?php
namespace App\Manager;

use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use League\OAuth2\Client\Provider\GithubResourceOwner;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;

class UserManager
{

     protected $entityManager;


     protected $passwordEncoder;


      /**
       * @param EntityManagerInterface $entityManager
       * @param UserPasswordEncoderInterface $passwordEncoder
     */
     public function __construct(EntityManagerInterface $entityManager, UserPasswordEncoderInterface $passwordEncoder)
     {
          $this->entityManager = $entityManager;
          $this->passwordEncoder = $passwordEncoder;
     }


     /**
      * @param User $user
      * @return User
     */
     public function saveUser(User $user): User
     {
          $this->entityManager->persist($user);
          $this->entityManager->flush();

          return $user;
     }


     /**
      * @param array $payload
      * @return User
     */
     public function createUserFormPayload(array $payload): User
     {
         $user = new User();
         $user->setEmail($payload['email']);
         $user->setPassword($this->passwordEncoder->encodePassword($user, $payload['password']));
         $user->setRoles((array) $payload['roles']);

         return $this->saveUser($user);
     }


     /**
      * @return User
     */
     public function createFakeUserJohnDoe(): User
     {
           return $this->createUserFormPayload([
               'email' => 'john@doe.fr',
               'password' => '1234',
               'roles'   => ['ROLE_USER']
           ]);
     }


     /**
      * @param GithubResourceOwner $owner
      * @return User
     */
     public function findOrCreateUserFromGithubAuth(GithubResourceOwner $owner): User
     {
           $repository = $this->entityManager->getRepository(User::class);

           /** @var User $user */
           $user = $repository->findUserFromOAuthGithubOauth($owner);

           if ($user) {
               if ($user->getGithubId() === null) {
                   $user->setGithubId($owner->getId());
                   $this->saveUser($user);
               }
               return $user;
           }

           $user = (new User())
                   ->setRoles(['ROLE_USER'])
                   ->setGithubId($owner->getId())
                   ->setEmail($owner->getEmail());


           return $this->saveUser($user);
     }
}