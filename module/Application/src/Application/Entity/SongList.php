<?php
/**
 * @author:Gabriel Acosta;
 * @email:gabo.acosta624@gmail.com
 * 
 * 1/08/13
 */

namespace Application\Entity;

use Application\Lib\CurlManager;

class SongList
{
    public function getTopTen()
    {
        $manager = new CurlManager();
        $manager->setURL('http://ws.audioscrobbler.com/2.0/?method=chart.getTopTracks&api_key=ecd8d7bafcc8e15bca7417350273067a&format=json&limit=10');


        $songs = $manager->fetchData();

        //var_dump($songs);

        $result = array();
        foreach($songs as $songsList){
            foreach($songsList['track'] as $track){

               $temp = new Song();
               $temp->setName($track['name']);
               $temp->setArtist($track['artist']['name']);
               if(isset($track['image']) && is_array($track['image']))
                    $temp->setAlbum($track['image'][0]['#text']);
               else
                   $temp->setAlbum('http://placehold.it/100x100');
               $result[]=$temp;

           }

       }



       return $result;

    }
}