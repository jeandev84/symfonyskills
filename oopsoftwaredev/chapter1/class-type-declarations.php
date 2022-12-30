<?php


require_once 'Player/Playlist.php';
require_once 'Player/Song.php';


$playlist = new Playlist();

$songs = [
    new Song('Blackbird', 100),
    new Song('Yesterday', 340)
];

foreach ($songs as $song) {
    print $song->name . PHP_EOL;
    print $song->numberOfPlays .PHP_EOL;
    $playlist->addSong($song);
}