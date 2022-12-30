<?php


require_once 'Song.php';

$songTitles = ['Yesterday', 'Help!', 'Something'];

$song = new Song($songTitles[0], 100);

var_dump($song->getName());

