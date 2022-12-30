<?php

// Create a song class
class Song
{
    // Create songId and title public properties
    public $songId;
    public $title;
}


// Instantiate an "Octopus's Garden" song using the new keyword
$octopusSong = new Song();
$octopusSong->songId = 1;
$octopusSong->title  = "Octopus's Garden";
// var_dump and check in the browser
// print_r($octopusSong);



class Playlist
{
     public $name;

     /**
      * @var Song[]
     */
     public $songs = [];


     public function addSong(Song $song)
     {
         $this->songs[] = $song;
     }
}


// Instantiate a song object of your favorite song
$yellowSubmarine = new Song();
// Set a songId and title
$yellowSubmarine->songId = 2;
$yellowSubmarine->title  = 'Yello Submarine';


$playlist = new Playlist();
$playlist->name = 'Rock';
$playlist->addSong($octopusSong);
$playlist->addSong($yellowSubmarine);

print_r($playlist->songs);


