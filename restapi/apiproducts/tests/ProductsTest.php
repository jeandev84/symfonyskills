<?php
namespace App\Tests;

use ApiPlatform\Core\Bridge\Symfony\Bundle\Test\ApiTestCase;
use App\Entity\ApiToken;
use App\Entity\User;
use Doctrine\ORM\EntityManagerInterface;
use Hautelook\AliceBundle\PhpUnit\RefreshDatabaseTrait;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Contracts\HttpClient\HttpClientInterface;

class ProductsTest extends ApiTestCase
{
    use RefreshDatabaseTrait;

    private const API_TOKEN = '48cd8891b36b5cf58e1d03229fd6d7945443d2d584cb93d44d04d6f5ac57744560b0a020b9dddeee7b6f61e0189a27a43280f2b798344a7cc16cadda';

    private HttpClientInterface $client;
    private EntityManagerInterface $entityManager;


    protected function setUp(): void
    {
        $this->client = $this->createClient();
        $this->entityManager = $this->client->getContainer()->get('doctrine')->getManager();

        /* dd($this->client, $this->entityManager); */

        $user = new User();
        $user->setEmail('info@akademycity.ru');
        $user->setPassword('brownsecret123456!');

        $this->entityManager->persist($user);
        $this->entityManager->flush();

        $apiToken = new ApiToken();
        $apiToken->setToken(self::API_TOKEN);
        $apiToken->setUser($user);

        $this->entityManager->persist($apiToken);
        $this->entityManager->flush();
    }



    public function testGetProductCollection()
    {
        $response = $this->client->request('GET', '/api/products', [
            'headers' => ['x-api-token' => self::API_TOKEN]
        ]);

        $this->assertResponseIsSuccessful();

        $this->assertResponseHeaderSame(
            'content-type', 'application/ld+json; charset=utf-8'
        );


        $this->assertJsonContains([
            '@context' => '/api/contexts/Product',
            '@id'      => '/api/products',
            '@type'    => 'hydra:Collection',
            'hydra:totalItems' => 100,
            'hydra:view'      => [
                '@id'         => '/api/products?page=1',
                '@type'       => 'hydra:PartialCollectionView',
                'hydra:first' => '/api/products?page=1',
                'hydra:last'  => '/api/products?page=20',
                'hydra:next'  => '/api/products?page=2',
            ],
        ]);


        $this->assertCount(5, $response->toArray()['hydra:member']);
    }





    public function testPagination()
    {
        $this->client->request('GET', '/api/products?page=2', [
            'headers' => ['x-api-token' => self::API_TOKEN]
        ]);

        $this->assertJsonContains([
            'hydra:view'      => [
                '@id'         => '/api/products?page=2',
                '@type'       => 'hydra:PartialCollectionView',
                'hydra:first' => '/api/products?page=1',
                'hydra:last'  => '/api/products?page=20',
                'hydra:previous'  => '/api/products?page=1',
                'hydra:next'  => '/api/products?page=3',
            ],
        ]);

    }




    public function testCreateProduct()
    {
        $this->client->request('POST', '/api/products', [
            'headers' => ['x-api-token' => self::API_TOKEN],
            'json' => [
                'mpn'  => '1234',
                'name' => 'A Test Product',
                'description' => 'A Test Description',
                'issueDate' => '1985-07-31',
                'manufacturer' => '/api/manufacturers/1'
            ]
        ]);


        $this->assertResponseStatusCodeSame(201);

        $this->assertResponseHeaderSame(
            'content-type', 'application/ld+json; charset=utf-8'
        );


        $this->assertJsonContains([
            'mpn'  => '1234',
            'name' => 'A Test Product',
            'description' => 'A Test Description',
            'issueDate' => '1985-07-31T00:00:00+00:00',
        ]);
    }




    public function testUpdateProduct()
    {
        $this->client->request('PUT', '/api/products/1', [
            'headers' => ['x-api-token' => self::API_TOKEN],
            'json' => [
                'description' => 'An updated description'
            ]
        ]);


        $this->assertResponseIsSuccessful();

        $this->assertJsonContains([
            '@id' => '/api/products/1',
            'description' => 'An updated description'
        ]);
    }




    public function testCreateInvalidProduct()
    {
        static::createClient()->request('POST', '/api/products', [
            'headers' => ['x-api-token' => self::API_TOKEN],
            'json' => [
                'mpn'  => '1234',
                'name' => 'A Test Product',
                'description' => 'A Test Description',
                'issueDate' => '1985-07-31',
                'manufacturer' => null
            ]
        ]);


        $this->assertResponseStatusCodeSame(422);

        $this->assertResponseHeaderSame('content-type', 'application/ld+json; charset=utf-8');


        $this->assertJsonContains([
            '@context'          => '/api/contexts/ConstraintViolationList',
            '@type'             => 'ConstraintViolationList',
            'hydra:title'       => 'An error occurred',
            'hydra:description' => 'manufacturer: This value should not be null.'
        ]);
    }





    public function testNoTokenProvided()
    {
        $this->client->request('PUT', '/api/products/1', [
            'headers' => [],
            'json' => [
                'description' => 'An updated description'
            ]
        ]);


        $this->assertResponseStatusCodeSame(401);

        $this->assertJsonContains([
            'message' => 'No API token provided.'
        ]);
    }



    public function testInvalidToken()
    {
        $this->client->request('PUT', '/api/products/1', [
            'headers' => ['x-api-token' => 'fake-token'],
            'json' => [
                'description' => 'An updated description'
            ]
        ]);


        $this->assertResponseStatusCodeSame(401);

        $this->assertJsonContains([
            'message' => 'Invalid credentials.'
        ]);
    }
}