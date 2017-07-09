<?php

namespace App\VATSIM;

use App\Models\System\Settings;
use GuzzleHttp\Client;
use Illuminate\Support\Facades\Schema;

class Connection
{
    private $baseUrl = 'https://api.vatusa.net/';
    private $apiKey;
    private $client;

    /**
     * Connection constructor.
     */
    public function __construct()
    {
        $this->client = new Client;
        if(Schema::hasTable('system_settings')) {
            if(Settings::find(1)) {
                $this->apiKey = Settings::find(1)->vatusa_api_key;
            } else {
                $settings = new Settings;
                $settings->save();
                $this->apiKey = '';
            }
        } else {
            $this->apiKey = '';
        }
    }

    /**
     * @return mixed
     */
    public function getRoster()
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/roster';
        $result = $client->get($url)->getBody();
        return json_decode($result);
    }

    /**
     * @return mixed
     */
    public function getTransfers()
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/transfer';
        $result = $client->get($url)->getBody();
        return json_decode($result);
    }

    /**
     * @param int $cid
     * @return mixed
     */
    public function getController($cid)
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/controller/'.$cid;
        $result = $client->get($url)->getBody();
        return json_decode($result);
    }

    /**
     * @param $id
     * @param $data
     * @return mixed
     */
    public function processTransfer($id, $data)
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/transfer/'.$id;
        $result = $client->post($url, $data)->getBody();
        return json_decode($result);
    }

    /**
     * @param $cid
     * @param $data
     * @return mixed
     */
    public function deleteRoster($cid, $data)
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/'.'roster/'.$cid;
        $result = $client->delete($url, $data)->getBody();
        return json_decode($result);
    }

    /**
     * @param $cid
     * @param $position
     * @param $data
     * @return mixed
     */
    public function addSolo($cid, $position, $data)
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/'.'solo/'.$cid.'/'.$position;
        $result = $client->post($url, $data)->getBody();
        return json_decode($result);
    }

    /**
     * @param $cid
     * @param $position
     * @return mixed
     */
    public function deleteSolo($cid, $position)
    {
        $client = $this->client;
        $url = $this->baseUrl.$this->apiKey.'/'.'solo/'.$cid.'/'.$position;
        $result = $client->delete($url)->getBody();
        return json_decode($result);
    }
}

