<?php
namespace App\Filesystem\Writer\Format;

use App\Filesystem\Writer\FileWriter;

class JsonFileWriter extends FileWriter
{
    /**
     * @inheritDoc
    */
    public function writeToFile($data): bool
    {
        // Open the file for writing ... write to the file ... close the file
        print PHP_EOL . 'Writing to json file...'. PHP_EOL;

        sleep(2);

        return true;
    }
}