<?php // class-methods

class Product
{
    public $name = 'soap';
    public $price = 100; # cens


    /**
     * @param $currencySymbol
     * @return string
    */
    public function priceAsCurrency($currencySymbol = '$')
    {
        $priceAsCurrency = $this->price / 100;

        return $currencySymbol . $priceAsCurrency;
    }
}


$product = new Product();
print $product->priceAsCurrency() . PHP_EOL; // Default symbol Dollar
print $product->priceAsCurrency("£") . PHP_EOL; // Pound symbol
print $product->priceAsCurrency("$") . PHP_EOL; // Dollar symbol
print $product->priceAsCurrency("€") . PHP_EOL; // Euro symbol