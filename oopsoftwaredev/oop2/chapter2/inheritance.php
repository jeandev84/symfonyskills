<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Bank - Account (Inheritance)</title>
</head>
<body>
 <?php

     /*
     require 'Bank/Account/Account.php';
     $account = new Account();
     $account->deposit(20);
     $account->withdraw(10);

     require 'Bank/Account/CheckingAccount.php';
     $checkingAccount = new CheckingAccount();
     $checkingAccount->deposit(20);
     $checkingAccount->withdraw(10);
     $checkingAccount->transfer(100);
     */

     require_once 'Bank/Account/Checking/PremiumCheckingAccount.php';

     $premiumCheckingAccount = new PremiumCheckingAccount();

     echo $premiumCheckingAccount->minimumBalance . "<br>";

     $premiumCheckingAccount->deposit(20);

     $premiumCheckingAccount->withdraw(10);

     $premiumCheckingAccount->transfer(1000);
 ?>
</body>
</html>

