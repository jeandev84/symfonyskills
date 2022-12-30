<?php

class Basket
{
    public $itemsTotal;
    public $shippingCost;
    public $discount;


    public function calculateSubTotal()
    {
        $subTotal = $this->itemsTotal + $this->shippingCost - $this->discount;

        return $subTotal;
    }
}
