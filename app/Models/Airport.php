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
        $response = $client->request('GET', 'https://api.aircharts.org/Airport/'.$this->icao.'.json',
            [
                'verify' => false
            ]);
        $aircharts_info = json_decode($response->getBody(), true);
        dd($aircharts_info);
        $aircharts_info = $aircharts_info[$this->icao];
        $this->charts = $aircharts_info['charts'];

        $this->airport_diagram = array_first($this->charts, function($i, $chart) {
            return $chart['type'] == 'General' && $chart['name'] == 'AIRPORT DIAGRAM';
        }, null);
        $this->general = array_filter($this->charts, function($chart){
            return $chart['type'] == 'General';
        });
        $this->departures = array_filter($this->charts, function($chart){
            return $chart['type'] == 'Departure';
        });
        $this->arrivals = array_filter($this->charts, function($chart){
            return $chart['type'] == 'Arrival';
        });
        $this->approaches = array_filter($this->charts, function($chart){
            return $chart['type'] == 'Approach';
        });

        dd($this);
    }
}