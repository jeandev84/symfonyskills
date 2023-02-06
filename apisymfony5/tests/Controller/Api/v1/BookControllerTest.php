<?php
namespace App\Tests\Controller\Api\v1;

use App\Controller\Api\v1\BookController;
use PHPUnit\Framework\TestCase;
use Symfony\Bundle\FrameworkBundle\Test\WebTestCase;


class BookControllerTest extends WebTestCase
{

    public function testGetBooksByCategory()
    {
        $client = static::createClient();
        $client->request('GET', '/api/v1/category/1/books');
        $responseContent = $client->getResponse()->getContent();

        # If response code is success
        $this->assertResponseIsSuccessful();
        $this->assertJsonStringEqualsJsonFile(
            __DIR__.'/responses/BookControllerTest_testGetBooksByCategory.json',
            $responseContent
        );
    }
}
