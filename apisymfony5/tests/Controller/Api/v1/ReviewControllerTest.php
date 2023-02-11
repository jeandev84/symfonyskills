<?php

namespace App\Tests\Controller\Api\v1;

use App\Controller\Api\v1\ReviewController;
use App\Entity\Book\Book;
use App\Entity\Reviews\Review;
use App\Tests\AbstractControllerTest;
use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use PHPUnit\Framework\TestCase;

class ReviewControllerTest extends AbstractControllerTest
{

    public function testGetBookReviews(): void
    {
         $book = $this->createBook();
         $this->createReview($book);

         $this->em->flush();

         $this->client->request('GET', '/api/v1/book/'. $book->getId(). '/reviews');

        $responseContent = json_decode($this->client->getResponse()->getContent(), true);

        // If response code is success
        $this->assertResponseIsSuccessful();
        $this->assertJsonDocumentMatchesSchema($responseContent, [
            'type' => 'object',
            'required' => ['items', 'rating', 'page', 'pages', 'perPage', 'total'],
            'properties' => [
                'rating' => ['type' => 'number'],
                'page' => ['type' => 'integer'],
                'pages' => ['type' => 'integer'],
                'perPage' => ['type' => 'integer'],
                'total' => ['type' => 'integer'],
                'items' => [
                    'type' => 'array',
                    'items' => [
                        'type' => 'object',
                        'required' => ['id', 'content', 'author', 'rating', 'createdAt'],
                        'properties' => [
                            'id' => ['type' => 'integer'],
                            'rating' => ['type' => 'integer'],
                            'createdAt' => ['type' => 'integer'],
                            'content' => ['type' => 'string'],
                            'author' => ['type' => 'string'],
                        ]
                    ]
                ]
            ],
        ]);
    }



    public function createBook(): Book
    {
        $book = new Book();
        $book->setTitle('Test book')
            ->setImage('http://localhost/demo.png')
            ->setMeap(true)
            ->setIsbn('123321')
            ->setDescription('test')
            ->setSlug('test-book')
            ->setPublicationDate(new DateTimeImmutable())
            ->setCategories(new ArrayCollection([]))
            ->setAuthors(['Tester']);

        $this->em->persist($book);

        return $book;
    }


    public function createReview(Book $book)
    {
        $this->em->persist((new Review())
           ->setAuthor('tester')
           ->setContent('test content')
           ->setCreatedAt(new DateTimeImmutable())
           ->setRating(5)
           ->setBook($book)
        );
    }
}
