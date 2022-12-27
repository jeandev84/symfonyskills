<?php
namespace App\Filesystem\Writer;

class NullFileWriter extends FileWriter
{

    /**
     * @inheritDoc
    */
    public function writeToFile($data): bool
    {
         // DO NOTHING
         print PHP_EOL . 'Null file writer ...not writing to file'. PHP_EOL;

         return true;
    }
}