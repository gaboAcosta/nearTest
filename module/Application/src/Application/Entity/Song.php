<?php
/**
 * @author:Gabriel Acosta;
 * @email:gabo.acosta624@gmail.com
 * 
 * 1/08/13
 */

namespace Application\Entity;

class Song
{

    protected $artist;

    protected $name;

    protected $album;

    protected $listeners;

    public function setListeners($listeners)
    {
        $this->listeners = $listeners;
    }

    public function getListeners()
    {
        return $this->listeners;
    }



    public function setAlbum($album)
    {
        $this->album = $album;
    }

    public function getAlbum()
    {
        return $this->album;
    }

    public function setArtist($artist)
    {
        $this->artist = $artist;
    }

    public function getArtist()
    {
        return $this->artist;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }



}