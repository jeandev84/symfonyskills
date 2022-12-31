<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Polymorphism</title>
</head>
<body>

<?php

     require_once __DIR__.'/Service/StockManager.php';
     require_once __DIR__.'/Service/File/CsvFileReader.php';
     require_once __DIR__.'/Service/File/JsonFileReader.php';

     $stockManager   = new StockManager();
     $csvFileReader  = new CsvFileReader();
     $jsonFileReader = new JsonFileReader();

     $stockManager->updateStockFromFile(__DIR__.'/storage/csv/inventory.csv', $csvFileReader);
     $stockManager->updateStockFromFile(__DIR__.'/storage/csv/inventory.json', $jsonFileReader);



     // Other demo polymorphism
     require_once __DIR__.'/Service/Random/RandomInterface.php';

     $a = new A();
     $b = new B();

     if ($a instanceof RandomInterface) {
        echo 'True'. PHP_EOL;
     } else {
        echo 'False'. PHP_EOL;
     }


     if ($b instanceof RandomInterface) {
        echo 'True'. PHP_EOL;
     } else {
        echo 'False'. PHP_EOL;
     }
?>

</body>
</html>