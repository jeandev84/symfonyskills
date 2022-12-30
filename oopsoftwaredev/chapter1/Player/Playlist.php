<?php

class Playlist
{

     /**
      * @var Song[]
     */
     public $songs = [];



     /**
      * @param Song $song
      * @return void
     */
     public function addSong(Song $song): void
     {
         $this->songs[] = $song;
     }




     /**
      * @return int
     */
     public function getLength(): int
     {
          return count($this->songs);
     }




     /**
      * @return Song[]
     */
     public function getSongs(): array
     {
          return $this->songs;
     }
}