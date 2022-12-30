<?php

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