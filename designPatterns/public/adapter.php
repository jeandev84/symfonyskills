<?php

require_once dirname(__DIR__, 1). '/vendor/autoload.php';


# $ php public/adapter.php
$newCsvFileWriter = new \App\Packages\Filesystem\NewCsvFileWriter();


# New File adapter
$fileWriter = new \App\Filesystem\Writer\Adapter\NewCsvFileWriterAdapter($newCsvFileWriter);


# Random Processing
$processor  = new \App\Filesystem\RandomProcessor($fileWriter);

$status = $processor->process(['foo' => 'bar']);