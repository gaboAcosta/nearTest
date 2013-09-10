<?php
/**
 * @author:Gabriel Acosta;
 * @email:gabo.acosta624@gmail.com
 * 
 * 1/08/13
 */

namespace Application\Entity;

use Application\Lib\CurlManager;

class ArtistList
{


    public function getTopTen()
    {
        $manager = new CurlManager();
        $manager->setURL('http://ws.audioscrobbler.com/2.0/?method=chart.getTopArtists&api_key=ecd8d7bafcc8e15bca7417350273067a&format=json&limit=10');


        $artists = $manager->fetchData();

        $result = array();
        foreach($artists as $artistList){
            foreach($artistList['artist'] as $artist){
                $temp = new Artist();
                $temp->setName($artist['name']);
                $temp->setPicture($artist['image'][0]['#text']);
                $temp->setMbid($artist['mbid']);
                $result[]=$temp;
            }

        }

        return $result;

    }

}