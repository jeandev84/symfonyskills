<?php
namespace App\Filesystem\Writer\Format;

use App\Filesystem\Writer\FileWriter;

class CsvFileWriter extends FileWriter
{

       /**
        * @inheritDoc
       */
       public function writeToFile($data): bool
       {
             // Open the file for writing ... write to the file ... close the file
             print PHP_EOL . 'Writing to csv file...'. PHP_EOL;

             sleep(2);

             return true;
       }
}