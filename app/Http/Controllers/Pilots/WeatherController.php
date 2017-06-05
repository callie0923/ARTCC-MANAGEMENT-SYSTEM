<?php

namespace App\Http\Controllers\Pilots;

use App\Http\Controllers\Controller;
use App\Models\System\Airport;
use App\Models\System\Settings;

class WeatherController extends Controller
{
    public function index()
    {
        $settings = Settings::find(1);
        return view('pilots.weather.index', compact('settings'));
    }

    public function metars()
    {
        $airports = Airport::with('weather')->where('is_artcc', 1)->orderBy('icao')->get();
        return view('pilots.weather.metars', compact('airports'))->render();
    }
}