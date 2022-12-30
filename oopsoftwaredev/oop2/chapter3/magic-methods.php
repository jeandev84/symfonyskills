<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width,  initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Records</title>
</head>
<body>

<?php


require_once 'Database/Connection.php';

// __construct called behind the scenes
$connection1 = new Connection();
$connection2 = new Connection();
// unset($connection2);
// print_r($connection2);

$connection1->setConnectionId('127.0.0.1');

print $connection1;

?>

<!-- // 2. Display the value in magic-methods.php -->
<p><?= 'The number of Connections is '. $connection1->getCount() ?></p>
<p><?= 'The conference ID is '. $connection1->conferenceId ?></p>
<p><?= 'The connection ID is '. $connection1->connectionId ?></p>
</body>
</html>