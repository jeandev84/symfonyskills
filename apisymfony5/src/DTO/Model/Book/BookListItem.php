<?php
namespace App\DTO\Model\Book;

class BookListItem
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




      /**
      * @return int
      */
     public function getId(): int
     {
        return $this->id;
     }




    /**
     * @param int $id
     * @return $this
    */
    public function setId(int $id): self
    {
        $this->id = $id;

        return $this;
    }



    /**
     * @return string
    */
    public function getTitle(): string
    {
        return $this->title;
    }



    /**
     * @param string $title
     * @return $this
    */
    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }



    /**
     * @return string
    */
    public function getSlug(): string
    {
        return $this->slug;
    }




    /**
     * @param string $slug
     * @return $this
    */
    public function setSlug(string $slug): self
    {
        $this->slug = $slug;

        return $this;
    }




    /**
     * @return string
    */
    public function getImage(): string
    {
        return $this->image;
    }


    /**
     * @param string $image
     * @return $this
    */
    public function setImage(string $image): self
    {
        $this->image = $image;

        return $this;
    }




    /**
     * @return array
    */
    public function getAuthors(): array
    {
        return $this->authors;
    }




    /**
     * @param string[] $authors
     * @return $this
    */
    public function setAuthors(array $authors): self
    {
        $this->authors = $authors;

        return $this;
    }




    /**
     * @return bool
    */
    public function isMeap(): bool
    {
        return $this->meap;
    }



    /**
     * @param bool $meap
     * @return $this
    */
    public function setMeap(bool $meap): self
    {
        $this->meap = $meap;

        return $this;
    }



    /**
     * @return int
    */
    public function getPublicationDate(): int
    {
        return $this->publicationDate;
    }



    /**
     * @param int $publicationDate
     * @return $this
    */
    public function setPublicationDate(int $publicationDate): self
    {
        $this->publicationDate = $publicationDate;

        return $this;
    }



}
