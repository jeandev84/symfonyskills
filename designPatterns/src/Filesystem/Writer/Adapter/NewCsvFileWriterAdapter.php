<?php
namespace App\Filesystem\Writer\Adapter;

use App\Filesystem\Writer\FileWriter;
use App\Packages\Filesystem\Contract\NewFileWriter;


class NewCsvFileWriterAdapter extends FileWriter
{


    /**
     * @var NewFileWriter
    */
    private NewFileWriter $fileWriter;



    /**
     * @param NewFileWriter $fileWriter
    */
    public function __construct(NewFileWriter $fileWriter)
    {
         $this->fileWriter = $fileWriter;
    }



    /**
     * @inheritDoc
    */
    public function writeToFile($data): bool
    {
        $this->fileWriter->write($data);

        return true;
    }
}