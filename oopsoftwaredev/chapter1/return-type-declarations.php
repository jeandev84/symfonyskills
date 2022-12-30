<?php


require_once 'Playlist.php';
require_once 'Song.php';


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


if ($playlist->getLength() < 10) {
     print 'Short playlist...'. PHP_EOL;
}


