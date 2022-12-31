<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abstract methods</title>
</head>
<body>

<?php

    require_once 'ShapeCalculator/Cylinder.php';

    $cylinder = new Cylinder(['radius' => 5, 'height' => 10]);
    $cylinderVolume = $cylinder->volume();

    print_r($cylinderVolume);
?>

</body>
</html>