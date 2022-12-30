<?php


/* Create a Class */
/*
class Product
{

}


$productInstance = new Product();
$anotherProductInstance = new Product();
var_dump($productInstance);
var_dump($anotherProductInstance);
*/


/* Create properties classes */
class Product
{
    public $name = 'soap';
    public $price = 10;
}


$soapObject = new Product();
print $soapObject->name ."\n";
$soapObject->name = 'toothpaste';
print $soapObject->name ."\n";

# Challenge
# 1. Create a price property and given it a default integer value
# 2. Access the price on a product object and print it
$product = new Product();
print $product->price . "\n";
# 3. Change the price
$product->price = 5;
# Access the (new) price on a product object and print it.
print $product->price . "\n";