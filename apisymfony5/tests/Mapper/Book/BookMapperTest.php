<?php

namespace App\Tests\Mapper\Book;

use App\DTO\Model\Book\BookDetails;
use App\Entity\Book\Book;
use App\Mapper\Book\BookMapper;
use App\Tests\AbstractTestCase;

class BookMapperTest extends AbstractTestCase
{

    public function testMap(): void
    {
        $book = (new Book())
                ->setTitle('title')
                ->setSlug('slug')
                ->setImage('123')
                ->setAuthors(['tester'])
                ->setMeap(true)
                ->setPublicationDate(new \DateTimeImmutable('2020-10-10'));


        $this->setEntityId($book, 1);

        $expected = (new BookDetails())
                    ->setId(1)
                    ->setSlug('slug')
                    ->setTitle('title')
                    ->setImage('123')
                    ->setAuthors(['tester'])
                    ->setPublicationDate(1602288000);


        $this->assertEquals($expected, BookMapper::map($book, new BookDetails()));
    }
}
