<?php
/**
 * Zend Framework (http://framework.zend.com/)
 *
 * @link      http://github.com/zendframework/ZendSkeletonApplication for the canonical source repository
 * @copyright Copyright (c) 2005-2013 Zend Technologies USA Inc. (http://www.zend.com)
 * @license   http://framework.zend.com/license/new-bsd New BSD License
 */

namespace Application\Controller;

use Application\Entity\Artist;
use Application\Entity\SongList;
use Zend\Mvc\Controller\AbstractActionController;
use Zend\View\Model\ViewModel;
use Application\Entity\ArtistList;

class IndexController extends AbstractActionController
{
    public function indexAction()
    {
        $artistList = new ArtistList();
        $artists = $artistList->getTopTen();

        $songList = new SongList();
        $songs = $songList->getTopTen();

        return new ViewModel(
            array(
                'artists' => $artists,
                'songs'   => $songs
            )
        );
    }

    public function artistAction()
    {
        $Match = $this->getEvent()->getRouteMatch();
        $mbid = $Match->getParam('mbid', 0);

        $artist = new Artist();
        $artist->setMbid($mbid);
        $artist->loadData();
        return new ViewModel(
            array(
                'test'=>'asd'
            )
        );
    }
}
