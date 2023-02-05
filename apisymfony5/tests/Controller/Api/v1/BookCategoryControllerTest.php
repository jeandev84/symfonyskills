<?php

namespace App\Tests\Controller\Api\v1;

use App\Controller\Api\v1\BookCategoryController;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


// Functional Test
class BookCategoryControllerTest extends WebTestCase
{

    public function testListBookCategories(): void
    {
          $client = static::createClient();
          $client->request('GET', '/api/v1/book/categories');
          $responseContent = $client->getResponse()->getContent();

          # If response code is success
          $this->assertResponseIsSuccessful();
          $this->assertJsonStringEqualsJsonFile(
   __DIR__.'/responses/BookCategoryControllerTest_testListBookCategories.json',
              $responseContent
          );
    }
}
