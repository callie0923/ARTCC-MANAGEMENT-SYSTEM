<?php

namespace App\Http\Models;

use App\BaseModel;
use GuzzleHttp\Client;

class Airport extends BaseModel
{
    public $table = 'airports';
    protected $primaryKey = 'icao';
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['name','iata','icao','lat','lon','elev','country','municipality','is_zjx'];

    public function loadCharts()
    {
        $client = new Client;
        $response = $client->request('GET', 'https://api.aircharts.org/v2/Airport/'.$this->icao,
            [
                'verify' => false
            ]);
        $aircharts_info = json_decode($response->getBody(), true);
        if(isset($aircharts_info[$this->icao]['charts'])) {
            $this->charts = $aircharts_info[$this->icao]['charts'];
        }
        return $this;
    }
}