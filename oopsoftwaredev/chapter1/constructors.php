<?php // constructors

class Product
{
    public $name;
    public $price;


    /**
     * @param string $name
     * @param int $price
    */
    public function __construct(string $name = 'Soap', int $price = 100)
    {
         $this->name  = $name;
         $this->price = $price;
    }



    /**
     * @param int $divisor
     * @param string $currencySymbol
     * @return string
     */
    public function priceAsCurrency($divisor = 1, $currencySymbol = '$'): string
    {
        $priceAsCurrency = $this->price / $divisor;

        return $currencySymbol . $priceAsCurrency;
    }
}


// $product = new Product('Soap', 30);
$product = new Product(price: 200);
print $product->name . PHP_EOL;
print $product->price . PHP_EOL;

$product = new Product('Tyres', 100);
print $product->name . PHP_EOL;