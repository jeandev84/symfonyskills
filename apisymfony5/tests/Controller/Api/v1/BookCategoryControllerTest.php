<?php

namespace App\Tests\Controller\Api\v1;

use App\Entity\Book\BookCategory;
use App\Tests\AbstractControllerTest;

// Functional Test
class BookCategoryControllerTest extends AbstractControllerTest
{
    public function testListBookCategories(): void
    {
        $this->em->persist((new BookCategory())->setTitle('Devices')->setSlug('devices'));
        $this->em->flush();

        $this->client->request('GET', '/api/v1/book/categories');
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
                        'required' => ['id', 'title', 'slug'],
                        'properties' => [
                            'title' => ['type' => 'string'],
                            'slug' => ['type' => 'string'],
                            'id' => ['type' => 'integer'],
                        ],
                    ],
                ],
            ],
        ]);
    }
}
