<?php

namespace App\DTO\Model\Book;

use App\DTO\Model\Book\Category\BookCategory;

class BookDetails
{
    private int $id;

    private string $title;

    private string $slug;

    private string $image;

    /**
     * @var string[]
     */
    private array $authors;

    private bool $meap;

    private int $publicationDate;

    private float $rating;

    private int $reviews;

    /**
     * @var BookCategory[]
     */
    private array $categories;

    /**
     * @var BookFormat[]
     */
    private array $formats;

    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @return $this
     */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }

    public function getTitle(): string
    {
        return $this->title;
    }

    /**
     * @return $this
     */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getSlug(): string
    {
        return $this->slug;
    }

    /**
     * @return $this
     */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }

    public function getImage(): string
    {
        return $this->image;
    }

    /**
     * @return $this
     */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }

    public function getAuthors(): array
    {
        return $this->authors;
    }

    /**
     * @param string[] $authors
     *
     * @return $this
     */
    public function setAuthors(array $authors): self
    {
        $this->authors = $authors;

        return $this;
    }

    public function isMeap(): bool
    {
        return $this->meap;
    }

    /**
     * @return $this
     */
    public function setMeap(bool $meap): self
    {
        $this->meap = $meap;

        return $this;
    }

    public function getPublicationDate(): int
    {
        return $this->publicationDate;
    }

    /**
     * @return $this
     */
    public function setPublicationDate(int $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    public function setRating(float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getReviews(): int
    {
        return $this->reviews;
    }

    /**
     * @return $this
     */
    public function setReviews(int $reviews): static
    {
        $this->reviews = $reviews;

        return $this;
    }

    /**
     * @return BookCategory[]
     */
    public function getCategories(): array
    {
        return $this->categories;
    }

    /**
     * @param array $categories
     *
     * @return $this
     */
    public function setCategories(array $categories): static
    {
        $this->categories = $categories;

        return $this;
    }

    /**
     * @return array
     */
    public function getFormats(): array
    {
        return $this->formats;
    }


    /**
     * @param array $formats
     * @return $this
     */
    public function setFormats(array $formats): static
    {
        $this->formats = $formats;

        return $this;
    }
}
