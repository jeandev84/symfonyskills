<?php
require_once __DIR__.'/File/Contract/FileReaderInterface.php';


class StockManager
{

       /**
        * @param string $filename
        * @param FileReaderInterface $fileReader
        * @return void
       */
       public function updateStockFromFile(string $filename, FileReaderInterface $fileReader)
       {
            $stockItems = $fileReader->readFileAsAssociativeArray($filename);

            foreach ($stockItems as $stockItem) {
                   print 'Updating the database with item: '. $stockItem['name'] . '<br>';
            }
       }
}