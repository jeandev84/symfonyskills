<?php // class-methods

class Product
{
    public $name = 'soap';
    public $price = 100; # cens



    /**
     * @param int $divisor
     * @param string $currencySymbol
     * @return string
    */
    public function priceAsCurrency($divisor = 1, $currencySymbol = '$')
    {
        $priceAsCurrency = $this->price / $divisor;

        return $currencySymbol . $priceAsCurrency;
    }
}


$product = new Product();
print $product->priceAsCurrency(100) . PHP_EOL;
print $product->priceAsCurrency(currencySymbol: 100) . PHP_EOL; // >=8.0