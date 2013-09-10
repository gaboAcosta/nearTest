<?php
/**
 * @author:Gabriel Acosta;
 * @email:gabo.acosta624@gmail.com
 * 
 * 1/08/13
 */

namespace Application\Lib;

class CurlManager
{
    protected $URL;

    protected $curl;


    public function setURL($url)
    {
        $this->URL = $url;
    }

    protected function init()
    {
        $this->curl = curl_init($this->URL);

        // Configuring curl options
        $options = array(
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_HTTPHEADER => array('Content-type: application/json')
        );

        // Setting curl options
        curl_setopt_array( $this->curl, $options );
    }

    public function __destruct()
    {
        // close curl resource to free up system resources
        curl_close($this->curl);
    }

    public function fetchData()
    {
        $this->init();
        // Getting results
        return json_decode(curl_exec($this->curl),true);
    }
}