<?php

require_once dirname(__DIR__, 1). '/vendor/autoload.php';


#  php public/null-object.php
$fileWriter = new \App\Filesystem\Writer\NullFileWriter();

$processor = new \App\Filesystem\RandomProcessor($fileWriter);
$processed = $processor->process(['foo' => 'bar']);

exit($processed);
