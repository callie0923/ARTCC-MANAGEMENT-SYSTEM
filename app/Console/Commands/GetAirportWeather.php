<?php

namespace App\Console\Commands;

use App\Models\System\Airport;
use App\Models\System\Weather;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use SimpleXMLElement;

class GetAirportWeather extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'artcc:weather';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Get ARRTCC Airport Weather';

    protected $metarSource = "https://www.aviationweather.gov/adds/dataserver_current/httpparam?dataSource=metars&requestType=retrieve&format=xml&hoursBeforeNow=2&mostRecentForEachStation=true&stationString=%s";

    /**
     * Create a new command instance.
     *
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $airports = Airport::where('is_artcc', 1)->get();
        foreach($airports as $airport) {

            $client = new Client;
            $url = sprintf($this->metarSource, $airport->icao);
            $response = $client->get($url);
            $root = new SimpleXMLElement($response->getBody());
            $metar = $root->data->METAR;

            $raw = (string)$metar->raw_text;

            if($raw == '') {
                continue;
            }

            if (preg_match('/\b([AQ])([0-9]{4})\b/',(string)$metar->raw_text, $matches)) {
                $altim_in_hg = substr($matches[2], 0, 2).'.'.substr($matches[2], -2);
            }

            $flight_cat = (string)$metar->flight_category;

            if(strpos((string)$metar->raw_text, 'VRB') !== false) {
                $wind_dir = 'VRB';
            }else if(strpos((string)$metar->raw_text, '00000KT') !== false) {
                $wind_dir = 'CALM';
            }elseif($metar->wind_dir_degrees < 100 && $metar->wind_dir_degrees > 1) {
                $wind_dir = '0'.$metar->wind_dir_degrees;
            } else {
                $wind_dir = (string)$metar->wind_dir_degrees;
            }

            if($metar->wind_speed_kt < 10 && $metar->wind_speed_kt > 1) {
                $wind_speed = '0'.$metar->wind_speed_kt;
            } else {
                $wind_speed = (string)$metar->wind_speed_kt;
            }

            if($wind_dir == 'CALM') {
                $wind = 'CALM';
            } else {
                $wind = $wind_dir.'@'.$wind_speed;
            }


            Weather::updateOrCreate([
                'airport_id' => $airport->id
            ],[
                'airport_id' => $airport->id,
                'metar' => $raw,
                'flight_cat' => $flight_cat,
                'altim_in_hg' => $altim_in_hg,
                'wind' => $wind
            ]);

        }
    }
}
