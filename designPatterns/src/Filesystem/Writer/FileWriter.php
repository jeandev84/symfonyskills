<?php
namespace App\Filesystem\Writer;


abstract class FileWriter
{
    /**
     * @param $data
     * @return bool
    */
    abstract public function writeToFile($data): bool;
}