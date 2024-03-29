<?php

namespace App\Mapper\Book;

use App\DTO\Model\Book\BookDetails;
use App\DTO\Model\Book\BookListItem;
use App\DTO\Model\Book\RecommendedBook;
use App\Entity\Book\Book;

class BookMapper
{
    public static function map(Book $book, BookDetails|BookListItem $model): BookDetails|BookListItem
    {
        return $model
            ->setId($book->getId())
            ->setTitle($book->getTitle())
            ->setSlug($book->getSlug())
            ->setImage($book->getImage())
            ->setAuthors($book->getAuthors())
            ->setMeap($book->isMeap())
            ->setPublicationDate($book->getPublicationDate()->getTimestamp());
    }

    public static function mapRecommended(Book $book): RecommendedBook
    {
        $description = $book->getDescription();
        $description = strlen($description) > 150 ? substr($description, 0, 150).'...' : $description;

        return (new RecommendedBook())
                ->setId($book->getId())
                ->setImage($book->getImage())
                ->setSlug($book->getSlug())
                ->setTitle($book->getTitle())
                ->setShortDescription($description);
    }
}
