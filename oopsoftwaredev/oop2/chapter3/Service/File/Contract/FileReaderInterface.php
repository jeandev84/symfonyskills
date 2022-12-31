<?php

interface FileReaderInterface
{

    /**
     * Read file as associative array
     *
     * @param string $filename
     * @return array
    */
    public function readFileAsAssociativeArray(string $filename): array;
}