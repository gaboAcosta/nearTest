<?php
/**
 * @author:Gabriel Acosta;
 * @email:gabo.acosta624@gmail.com
 * 
 * 1/08/13
 */

namespace Application\Entity;

class Album
{
    protected $name;

    protected $playCount;

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setPlayCount($playCount)
    {
        $this->playCount = $playCount;
    }

    public function getPlayCount()
    {
        return $this->playCount;
    }


}