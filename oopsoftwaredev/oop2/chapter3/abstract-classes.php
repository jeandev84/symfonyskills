<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Abstract classes</title>
</head>
<body>

<?php


    require_once 'Database/Table/Product.php';
    require_once 'Database/Table/User.php';

    $product = new Product();
    $product->save();


    $user = new User();
    $user->save();

?>
</body>
</html>


