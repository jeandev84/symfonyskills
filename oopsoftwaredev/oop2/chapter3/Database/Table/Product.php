<?php
require_once __DIR__.'/../../Database/DataModel.php'; // this well be changed by namespace later


class Product extends DataModel
{
     private int $id;
     private string $name;
     private int $price;
     protected string $tableName = 'products';


     /**
      * @return mixed
     */
     public function getId()
     {
         return $this->id;
     }



    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }


    /**
     * @return string
    */
    public function getName(): string
    {
        return $this->name;
    }


    /**
     * @param int $price
    */
    public function setPrice(int $price): void
    {
        $this->price = $price;
    }





    /**
     * @return int
    */
    public function getPrice(): int
    {
        return $this->price;
    }
}