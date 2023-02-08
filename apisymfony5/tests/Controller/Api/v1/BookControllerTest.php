<?php

namespace App\Tests\Controller\Api\v1;

use App\Entity\Book\Book;
use App\Entity\Book\BookCategory;
use App\Tests\AbstractControllerTest;
use Doctrine\Common\Collections\ArrayCollection;

class BookControllerTest extends AbstractControllerTest
{
    public function testGetBooksByCategory()
    {
        $this->client->request('GET', '/api/v1/category/1/books');
        $responseContent = json_decode($this->client->getResponse()->getContent(), true);

        // If response code is success
        $this->assertResponseIsSuccessful();
        $this->assertJsonDocumentMatchesSchema($responseContent, [
            'type' => 'object',
            'required' => ['items'],
            'properties' => [
                'items' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'required' => ['id', 'title', 'slug', 'image', 'authors', 'meap', 'publicationDate'],
                        'properties' => [
                            'title' => ['type' => 'string'],
                            'slug' => ['type' => 'string'],
                            'image' => ['type' => 'string'],
                            'meap' => ['type' => 'boolean'],
                            'id' => ['type' => 'integer'],
                            'publicationDate' => ['type' => 'integer'],
                            'authors' => [
                                'type' => 'array',
                                'items' => ['type' => 'string'],
                            ],
                        ],
                    ],
                ],
            ],
        ]);
    }



    public function createCategory(): int
    {
        $bookCategory = (new BookCategory())
                        ->setTitle('Devices')
                        ->setSlug('devices');

        $this->em->persist((new Book())
                           ->setTitle('Test book')
                           ->setImage('http://localhost/demo.png')
                           ->setMeap(true)
                           ->setSlug('test-book')
                           ->setPublicationDate(new \DateTime())
                           ->setAuthors(['Tester'])
                           ->setCategories(new ArrayCollection([$bookCategory]))
        );

        $this->em->persist($bookCategory);
        $this->em->flush();

        return $bookCategory->getId();
    }
}
