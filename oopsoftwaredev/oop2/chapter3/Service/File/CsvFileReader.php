<?php

require_once __DIR__ . '/Contract/FileReaderInterface.php';


class CsvFileReader implements FileReaderInterface
{

    /**
     * @inheritDoc
     */
    public function readFileAsAssociativeArray(string $filename): array
    {
        // Get the rows from the file as arrays
        $rows = array_map('str_getcsv', file($filename));


        // Separate the header
        $header = array_shift($rows);

        $items = [];

        // Create as associative array, using header values as keys
        foreach ($rows as $row) {
            $items[] = array_combine($header, $row);
        }

        // Return the associative array
        return $items;
    }
}



$csvReader = new CsvFileReader();
$items = $csvReader->readFileAsAssociativeArray('inventory.csv');
print_r($items);

