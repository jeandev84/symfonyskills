<?php

require_once dirname(__DIR__, 1). '/vendor/autoload.php';


# $ php public/dependency-injection.php
# $fileWriter = new \App\Filesystem\Writer\Format\CsvFileWriter();
$fileWriter   = new \App\Filesystem\Writer\Format\JsonFileWriter();

$processor  = new \App\Filesystem\RandomProcessor($fileWriter);

$status = $processor->process(['foo' => 'bar']);