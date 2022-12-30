<?php

// boolean
// integer
// float
// string
// object
// resource
// array
// null

declare(strict_types=1);

require_once 'Player/Song.php';

$song = new Song('Blackbird', 123);

print $song->name . PHP_EOL;