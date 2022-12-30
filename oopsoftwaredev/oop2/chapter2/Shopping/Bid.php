<?php

// Bid     : Offre d' achat
// $amount : le montant
class Bid
{

     private $minimumBid = 5; // default set for demo purposes only
     private $bidAmount;


    /**
     * @param int $amount
     */
    public function setMinimumBid(int $amount): void
    {
        $this->minimumBid = $amount;
    }


    /**
     * @return int
     */
    public function getMinimumBid(): int
    {
        return $this->minimumBid;
    }


    /**
     * @param mixed $amount
    */
    public function setBidAmount($amount): void
    {
        if ($amount < $this->minimumBid) {

             $this->bidAmount = $this->minimumBid;

             return;
        }

        $this->bidAmount = $amount;
    }


    /**
     * @return mixed
     */
    public function getBidAmount()
    {
        return $this->bidAmount;
    }
}