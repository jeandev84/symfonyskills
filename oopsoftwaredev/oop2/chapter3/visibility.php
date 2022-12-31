<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Load File Data (Visibility)</title>
</head>
<body>
<?php

use File\CsvFileReader;

require 'Filesystem/Reader/FileReader.php';
    require 'Filesystem/Reader/CsvFileReader.php';

    $fileReader    = new FileReader();
    $csvFileReader = new CsvFileReader();
?>

<p><?= $fileReader->getData(); ?></p>
<p><?php echo $csvFileReader->getData(); ?></p>
</body>
</html>

