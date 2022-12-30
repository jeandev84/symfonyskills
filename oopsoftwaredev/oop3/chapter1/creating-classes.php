<?php // creating-classes

class Product
{
    public $name = 'soap';
    public $price; # cens


    public function priceAsCurrency()
    {
         $priceAsCurrency = $this->price / 100;

         return $priceAsCurrency;
    }
}


$soapObject1 = new Product();
$soapObject1->price = 550;

$soapObject2 = new Product();
$soapObject2->price = 650;

$priceAsCurrency = $soapObject1->priceAsCurrency();
var_dump($priceAsCurrency) . PHP_EOL;

