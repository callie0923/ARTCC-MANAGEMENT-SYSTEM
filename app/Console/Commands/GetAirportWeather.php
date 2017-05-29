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

            $altim = substr((string)$metar->altim_in_hg, 0, 6);
            if((int)substr($altim, -1) > 4) {
                $altim = substr($altim, 0, 5);;
                $last = substr($altim, -1)+1;
                $altim = substr($altim, 0, 4);
                $altim_in_hg = $altim.$last;
            } else {
                $altim_in_hg = substr($altim, 0, 5);
            }

            $flight_cat = (string)$metar->flight_category;


            Weather::updateOrCreate([
                'airport_id' => $airport->id
            ],[
                'airport_id' => $airport->id,
                'metar' => $raw,
                'flight_cat' => $flight_cat,
                'altim_in_hg' => $altim_in_hg,
            ]);

        }
    }
}
