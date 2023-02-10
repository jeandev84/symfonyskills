<?php

namespace App\DTO\Model\Reviews;

class ReviewPage
{
    /**
     * @var Review[]
     */
    private array $items;

    private float $rating;

    private int $page;

    private int $pages;

    private int $perPage;

    private int $total;

    public function getItems(): array
    {
        return $this->items;
    }

    /**
     * @param array $items
     * @return ReviewPage
     */
    public function setItems(array $items): static
    {
        $this->items = $items;

        return $this;
    }

    public function getRating(): float
    {
        return $this->rating;
    }

    /**
     * @param float $rating
     * @return ReviewPage
     */
    public function setRating(float $rating): static
    {
        $this->rating = $rating;

        return $this;
    }

    public function getPage(): int
    {
        return $this->page;
    }

    /**
     * @param int $page
     * @return ReviewPage
     */
    public function setPage(int $page): static
    {
        $this->page = $page;

        return $this;
    }

    public function getPages(): int
    {
        return $this->pages;
    }

    /**
     * @param int $pages
     * @return ReviewPage
     */
    public function setPages(int $pages): static
    {
        $this->pages = $pages;

        return $this;
    }

    public function getPerPage(): int
    {
        return $this->perPage;
    }

    /**
     * @param int $perPage
     * @return ReviewPage
     */
    public function setPerPage(int $perPage): static
    {
        $this->perPage = $perPage;

        return $this;
    }

    public function getTotal(): int
    {
        return $this->total;
    }

    /**
     * @param int $total
     * @return ReviewPage
     */
    public function setTotal(int $total): static
    {
        $this->total = $total;

        return $this;
    }
}
