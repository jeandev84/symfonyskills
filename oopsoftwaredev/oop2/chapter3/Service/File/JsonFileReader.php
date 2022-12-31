<?php
require_once __DIR__.'/Contract/FileReaderInterface.php';


class JsonFileReader implements FileReaderInterface
{

    public function readFileAsAssociativeArray(string $filename): array
    {
           // Get file content as json string
           $contentString = file_get_contents($filename);


           // Decode into an associative array (items)
           $items = json_decode($contentString, true);


           // Return items
           return $items;
    }
}


/*
$jsonReader = new JsonFileReader();
$items = $jsonReader->readFileAsAssociativeArray('inventor.json');

print_r($items);
*/