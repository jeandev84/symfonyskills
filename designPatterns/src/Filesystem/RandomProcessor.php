<?php
namespace App\Filesystem;

use App\Filesystem\Writer\FileWriter;
use App\Filesystem\Writer\Format\CsvFileWriter;


class RandomProcessor
{

      /**
       * @var FileWriter
      */
      private FileWriter $fileWriter;



      /**
       * @param FileWriter $fileWriter
      */
      public function __construct(FileWriter $fileWriter)
      {
           $this->fileWriter = $fileWriter;
      }




      /**
       * @param array $data
       * @return bool
       * @throws \Exception
      */
      public function process(array $data)
      {
           // try to write to file
           $result = $this->fileWriter->writeToFile($data);

           if (!$result) {
                throw new \Exception('Error writing to file');
           }

           // Continue processing
           print 'Continue processing...'. PHP_EOL;

           return true;
     }





     /**
      * @param array $data
      * @return bool
      * @throws \Exception
     */
     public function processCsvFileWriter(array $data)
     {
            // try to write to file
            $fileWriter = new CsvFileWriter();

            $result = $fileWriter->writeToFile($data);

            if (!$result) {
                throw new \Exception('Error writing to file');
            }

            // Continue processing
            print 'Continue processing...'. PHP_EOL;

            return true;
    }
}