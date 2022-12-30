<?php

class Playlist
{

     /**
      * @var Song[]
     */
     public $songs = [];



     /**
      * @param Song $song
      * @return $this
     */
     public function addSong(Song $song): static
     {
         $this->songs[] = $song;

         return $this;
     }


     /**
      * @return Song[]
     */
     public function getSongs(): array
     {
          return $this->songs;
     }
}