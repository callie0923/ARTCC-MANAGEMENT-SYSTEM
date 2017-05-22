<?php

namespace App\Http\Controllers\Pilots;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RouteController extends Controller
{
    public function index()
    {
        return view('pilots.routes.index');
    }

    public function loadRoutes(Request $request)
    {
        $dep = $request->get('departure_icao');
        $arr = $request->get('arrival_icao');

        $ch = curl_init();
        $url = "http://uk.flightaware.com/analysis/route.rvt?origin={$dep}&destination={$arr}";

        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_USERAGENT, "Mozilla/4.0 (compatible; MSIE 8.0; Windows NT 6.0)");
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST,false);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER,false);
        curl_setopt($ch, CURLOPT_MAXREDIRS, 10);
        curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);
        $data = curl_exec($ch);
        curl_close($ch);

        $first_step = explode( '<table class="prettyTable fullWidth">' , $data );
        $second_step = explode("</table>" , $first_step[1] );

        $html = '<table class="table prettyTable fullWidth" id="resultsTable">'.$second_step[0].'</table>';
        $html = str_replace("\t", '', $html);
        $html = str_replace("\n", '', $html);
        return response()->json(['html' => $html]);
    }
}