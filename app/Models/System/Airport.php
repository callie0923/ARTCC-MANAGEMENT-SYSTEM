<?php

namespace App\Models\System;

use App\BaseModel;
use GuzzleHttp\Client;
use SimpleXMLElement;
use StdClass;

class Airport extends BaseModel
{
    public $table = 'airports';
    protected $primaryKey = 'icao';
    public $incrementing = false;
    public $timestamps = false;
    public $fillable = ['name','iata','icao','lat','lon','elev','country','municipality','is_artcc'];
    protected $metarSource = "https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=2&mostRecentForEachStation=true&stationString=%s";

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

    public function loadWeather()
    {
        $client = new Client;
        $url = sprintf($this->metarSource, $this->icao);
        $response = $client->get($url);
        $root = new SimpleXMLElement($response->getBody());
        $metar = $root->data->METAR;

        $weather = new StdClass;
        // raw metar
        $weather->metar = (string)$metar->raw_text;


        // temperature
        if(isset($metar->temp_c)) {
            $weather->temp_c = explode('.', $metar->temp_c)[0];
        }

        // dewpoint
        if(isset($metar->dewpoint_c)) {
            if(explode('.', $metar->dewpoint_c)[0] < 10 && explode('.', $metar->dewpoint_c)[0] > 0) {
                $weather->dewpoint_c = '0'.explode('.', $metar->dewpoint_c)[0];
            } else {
                $weather->dewpoint_c = explode('.', $metar->dewpoint_c)[0];
            }
        }

        // wind direction
        if(isset($metar->wind_dir_degrees)) {
            if($metar->wind_dir_degrees < 100 && $metar->wind_dir_degrees > 1) {
                $weather->wind_dir = '0'.$metar->wind_dir_degrees;
            } else {
                $weather->wind_dir = (string)$metar->wind_dir_degrees;
            }
        }

        // wind speed
        if(isset($metar->wind_speed_kt)) {
            if($metar->wind_speed_kt < 10 && $metar->wind_speed_kt > 1) {
                $weather->wind_speed = '0'.$metar->wind_speed_kt;
            } else {
                $weather->wind_speed = (string)$metar->wind_speed_kt;
            }
        }


        // visibility_statute_mi
        if(isset($metar->visibility_statute_mi)) {
            if(strpos((string)$metar->raw_text, '9999') !== false || strpos((string)$metar->raw_text, 'CAVOK') !== false) {
                $weather->visbility = '10.0';
            } else {
                $weather->visbility = (string)$metar->visibility_statute_mi;
            }
        }


        // altim_in_hg
        if(isset($metar->altim_in_hg)) {
            $altim = substr((string)$metar->altim_in_hg, 0, 6);

            if((int)substr($altim, -1) > 4) {
                $altim = substr($altim, 0, 5);;
                $last = substr($altim, -1)+1;
                $altim = substr($altim, 0, 4);
                $weather->altim_in_hg = $altim.$last;
            } else {
                $weather->altim_in_hg = substr($altim, 0, 5);
            }
        }


        // sea_level_pressure_mb
        if(isset($metar->sea_level_pressure_mb)) {
            $weather->sea_level_pressure_mb = explode('.', $metar->sea_level_pressure_mb)[0];
        }else if(preg_match("/(Q)[0-9]{4}/",(string)$metar->raw_text, $qnh_array)) {
            $qnh = str_replace('Q', '', $qnh_array[0]);
            $weather->sea_level_pressure_mb = $qnh;
        }

        // flight_cat
        if(isset($metar->flight_category)) {
            $weather->flight_cat = (string)$metar->flight_category;
        }


        // clouds
        $clouds = [];
        if(strpos((string)$metar->raw_text, 'CAVOK') !== false) {
            $newCloud = new StdClass;
            $newCloud->cover = 'CLR';
            array_push($clouds, $newCloud);
        } else if(isset($metar->sky_condition)) {
            foreach($metar->sky_condition as $cloud) {
                $newCloud = new StdClass;
                if(isset($cloud['sky_cover'])) $newCloud->cover = (string)$cloud['sky_cover'];
                if(isset($cloud['cloud_base_ft_agl'])) $newCloud->level = (string)$cloud['cloud_base_ft_agl'];
                array_push($clouds, $newCloud);
            }
        }
        $weather->clouds = $clouds;

        $this->weather = $weather;
        return $this;
    }
}
