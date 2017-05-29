<?php

namespace App\VATSIM;

use GuzzleHttp\Client;

class VATUSAConnection
{
    private $baseUrl = 'https://api.vatusa.net/';

    /**
     * @param $endpoint
     * @param $key
     * @return mixed
     */
    public function get($key, $endpoint)
    {
        $client = new Client;
        $url = $this->baseUrl.$key.'/'.$endpoint;
        $result = $client->get($url)->getBody();
        return json_decode($result);
    }

    /**
     * @param $endpoint
     * @param $key
     * @param $data
     * @return mixed
     */
    public function post($key, $endpoint, $data)
    {
        $client = new Client;
        $url = $this->baseUrl.$key.'/'.$endpoint;
        $r = $client->request('POST', $url, [
            'json' => $data
        ]);
        $result = $r->getBody();
        return json_decode($result);
    }

    /**
     * @param $key
     * @param $cid
     * @param $data
     * @return mixed
     */
    public function deleteRoster($key, $cid, $data)
    {
        $client = new Client;
        $url = $this->baseUrl.$key.'/'.'roster/'.$cid;
        $r = $client->request('POST', $url, [
            'json' => $data
        ]);
        $result = $r->getBody();
        return json_decode($result);
    }

    /**
     * @param $key
     * @param $cid
     * @param $position
     * @return mixed
     */
    public function deleteSoloCert($key, $cid, $position)
    {
        $client = new Client;
        $url = $this->baseUrl.$key.'/'.'solo/'.$cid.'/'.$position;
        $result = $client->delete($url)->getBody();
        return json_decode($result);
    }
}

