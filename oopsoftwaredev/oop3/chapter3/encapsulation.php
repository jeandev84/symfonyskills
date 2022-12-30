<?php

require_once'Player/Playlist.php';
require_once 'Player/Song.php';


$beatlesSongs = new Playlist();

$song = new Song('Yesterday', 100);
$fakeSong = 'This is a song..it the string';

$beatlesSongs->addSong($song);

var_dump($beatlesSongs->getSongs());


