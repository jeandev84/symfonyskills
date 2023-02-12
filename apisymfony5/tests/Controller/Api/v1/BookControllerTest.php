<?php

namespace App\Tests\Controller\Api\v1;

use App\Entity\Book\Book;
use App\Entity\Book\BookCategory;
use App\Entity\Book\BookFormat;
use App\Entity\Book\BookToBookFormat;
use App\Tests\AbstractControllerTest;
use DateTimeImmutable;
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

    public function testBookById(): void
    {
        $bookId = $this->createBook();

        $this->client->request('GET', "/api/v1/book/{$bookId}");
        $responseContent = json_decode($this->client->getResponse()->getContent(), true);

        // If response code is success
        $this->assertResponseIsSuccessful();
        $this->assertJsonDocumentMatchesSchema($responseContent, [
            'type' => 'object',
            'required' => [
                'id', 'title', 'slug', 'image', 'authors', 'meap', 'publicationDate', 'rating', 'reviews',
                'categories', 'formats',
            ],
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
                            'rating' => ['type' => 'number'],
                            'reviews' => ['type' => 'integer'],
                            'categories' => [
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
                           ->setIsbn('123321')
                           ->setDescription('test')
                           ->setSlug('test-book')
                           ->setPublicationDate(new DateTimeImmutable())
                           ->setAuthors(['Tester'])
                           ->setCategories(new ArrayCollection([$bookCategory]))
        );

        $this->em->persist($bookCategory);
        $this->em->flush();

        return $bookCategory->getId();
    }

    public function createBook(): int
    {
        $bookCategory = (new BookCategory())
            ->setTitle('Devices')
            ->setSlug('devices');

        $this->em->persist($bookCategory);

        $format = (new BookFormat())
                  ->setTitle('format')
                  ->setDescription('description format')
                  ->setComment(null);

        $this->em->persist($format);

        $book = (new Book())
            ->setTitle('Test book')
            ->setImage('http://localhost/demo.png')
            ->setMeap(true)
            ->setIsbn('123321')
            ->setDescription('test')
            ->setSlug('test-book')
            ->setPublicationDate(new DateTimeImmutable())
            ->setAuthors(['Tester'])
            ->setCategories(new ArrayCollection([$bookCategory]));

        $this->em->persist($book);

        $join = (new BookToBookFormat())
                ->setPrice(123.55)
                ->setFormat($format)
                ->setDiscountPercent(5)
                ->setBook($book)
        ;

        $this->em->persist($join);
        $this->em->flush();

        return $book->getId();
    }
}
