<?php
namespace App\Tests;

use App\Repository\UserRepository;
use Symfony\Bundle\FrameworkBundle\KernelBrowser;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;

class AuthorizationTest extends WebTestCase
{

       /**
        * @var KernelBrowser
       */
       private KernelBrowser $client;


       /**
        * @var UserRepository|object|null
       */
       private UserRepository|null $userRepo;


       protected function setUp(): void
       {
           $this->client = static::createClient();
           $this->userRepo = static::$container->get(UserRepository::class);
       }


       /** @test  */
       public function an_admin_can_visit_the_admin_dashboard()
       {
            $testUser = $this->userRepo->findOneByEmail('john@example.com');

            // Simulate logging the user in
            $this->client->loginUser($testUser);

            $this->client->request('GET', '/admin/dashboard');

            $this->assertResponseIsSuccessful();

       }


       /** @test */
       public function a_user_cannot_view_another_users_account() {

           $testUser = $this->userRepo->findOneByEmail('stooge@example.com');

           // Simulate logging the user in
           $this->client->loginUser($testUser);

           $this->client->request('GET', '/account/1');

           $this->assertResponseStatusCodeSame(403); // unauthorized | forbidden
       }



       /** @test */
       public function an_account_holder_can_view_their_own_account() {

           $testUser = $this->userRepo->findOneByEmail('anotheruser@example.com');

           // Simulate logging the user in
           $this->client->loginUser($testUser);

           $this->client->request('GET', '/account/1');

           $this->assertResponseIsSuccessful();
       }



       /** @test */
       public function an_account_manager_can_view_accounts_witch_they_manage() {

           $testUser = $this->userRepo->findOneByEmail('accmanager@example.com');

           // Simulate logging the user in
           $this->client->loginUser($testUser);

           $this->client->request('GET', '/account/1');

           $this->assertResponseIsSuccessful();

       }




       /** @test */
       public function an_non_admin_can_NOT__delete_an_account() {

           $testUser = $this->userRepo->findOneByEmail('stooge@example.com');

           // Simulate logging the user in
           $this->client->loginUser($testUser);

           $this->client->request('GET', '/account/1/delete');

           $this->assertResponseStatusCodeSame(403);
       }


       /** @test */
       public function an_admin_can_delete_an_account() {

           $testUser = $this->userRepo->findOneByEmail('john@example.com');

           // Simulate logging the user in
           $this->client->loginUser($testUser);

           $this->client->request('GET', '/account/1/delete');

           $this->assertResponseIsSuccessful();
       }
}