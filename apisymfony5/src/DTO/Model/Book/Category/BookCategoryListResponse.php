<?php
namespace App\DTO\Model\Book\Category;

class BookCategoryListResponse
{
    /**
     * @var BookCategory[]
    */
    private array $items;



    /**
     * @param BookCategory[] $items
    */
    public function __construct(array $items)
    {
        $this->items = $items;
    }


    /**
     * @return BookCategory[]
    */
    public function getItems(): array
    {
        return $this->items;
    }
}
