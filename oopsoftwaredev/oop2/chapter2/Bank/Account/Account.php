<?php

class Account
{

       public $accountNumber;
       public $balance;



      /**
       * @param $amount
       * @return void
      */
      public function deposit($amount)
      {
          echo 'Depositing '. $amount . '<br>';

          // $this->balance += $amount;
      }


      public function withdraw($amount)
      {
          echo 'Withdrawing '. $amount . '<br>';
      }




      /**
       * @return mixed
      */
      public function getBalance()
      {
          return $this->balance;
      }
}