<?php
/**
 * @author:Gabriel Acosta;
 * @email:gabo.acosta624@gmail.com
 * 
 * 1/08/13
 */

namespace Application\Entity;

use Application\Lib\CurlManager;

class Artist
{
    protected $picture;

    protected $name;

    protected $mbid;

    protected $bio;

    protected $albums;

    public function setMbid($mbid)
    {
        $this->mbid = $mbid;
    }

    public function getMbid()
    {
        return $this->mbid;
    }

    public function loadData()
    {
        $manager = new CurlManager();
        $manager->setURL('http://ws.audioscrobbler.com/2.0/?method=artist.getInfo&api_key=ecd8d7bafcc8e15bca7417350273067a&format=json&limit=10&mbid='.$this->mbid);
        $data = $manager->fetchData();

        $this->name = $data['artist']['name'];
        $this->bio = $data['artist']['bio']['content'];
        $this->picture = $data['artist']['image'][2]['#text'];

        unset($manager);
        $this->loadSongs();
        $this->loadAlbums();

        var_dump($this);


    }
    protected function loadSongs()
    {
        $manager = new CurlManager();
        $manager->setURL('http://ws.audioscrobbler.com/2.0/?method=artist.getTopTracks&api_key=ecd8d7bafcc8e15bca7417350273067a&format=json&limit=10&mbid='.$this->mbid);
        $data = $manager->fetchData();

        $this->albums = array();

        foreach($data['toptracks']['track'] as $song){
            $temp = new Song();
            $temp->setName($song['name']);
            $temp->setListeners($song['listeners']);
            $this->songs[]=$temp;
        }
    }

    protected function loadAlbums()
    {
        $manager = new CurlManager();
        $manager->setURL('http://ws.audioscrobbler.com/2.0/?method=artist.getTopAlbums&api_key=ecd8d7bafcc8e15bca7417350273067a&format=json&limit=10&mbid='.$this->mbid);
        $data = $manager->fetchData();

        $this->albums = array();

        foreach($data['topalbums']['album'] as $album){
            $temp = new Album();
            $temp->setName($album['name']);
            $temp->setPlayCount($album['playcount']);
            $this->albums[]=$temp;
        }
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPicture($picture)
    {
        $this->picture = $picture;
    }

    public function getPicture()
    {
        return $this->picture;
    }



}