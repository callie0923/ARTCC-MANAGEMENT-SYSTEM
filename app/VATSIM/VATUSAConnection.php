<?php

namespace App\VATSIM;

use GuzzleHttp\Client;

class VATUSAConnection
{
    private $baseUrl = 'https://api.vatusa.net/9IFQrWqaPbzcHoxA/';

    /**
     * @param $endpoint
     * @return mixed
     */
    public function get($endpoint)
    {
        $client = new Client;
        $url = $this->baseUrl.$endpoint;
        $result = $client->get($url)->getBody();
        return json_decode($result);
    }

    /**
     * @param $endpoint
     * @param $data
     * @return mixed
     */
    public function post($endpoint, $data)
    {
        $client = new Client;
        $url = $this->baseUrl.$endpoint;
        $r = $client->request('POST', $url, [
            'json' => $data
        ]);
        $result = $r->getBody();
        return json_decode($result);
    }

    /**
     * @param $cid
     * @param $data
     * @return mixed
     */
    public function deleteRoster($cid, $data)
    {
        $client = new Client;
        $url = $this->baseUrl.'roster/'.$cid;
        $r = $client->request('POST', $url, [
            'json' => $data
        ]);
        $result = $r->getBody();
        return json_decode($result);
    }

    /**
     * @param $cid
     * @param $position
     * @return mixed
     */
    public function deleteSoloCert($cid, $position)
    {
        $client = new Client;
        $url = $this->baseUrl.'solo/'.$cid.'/'.$position;
        $result = $client->delete($url)->getBody();
        return json_decode($result);
    }
}

