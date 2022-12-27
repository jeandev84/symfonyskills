<?php
namespace App\Http;

interface FinanceApiClientInterface
{
     /**
      * @param string $symbol
      * @param string $region
      * @return mixed
     */
     public function fetchStockProfile(string $symbol, string $region);
}