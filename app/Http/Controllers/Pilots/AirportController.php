<?php

namespace App\Http\Controllers\Pilots;

use App\Http\Controllers\Controller;
use App\Http\Models\Airport;
use Illuminate\Http\Request;

class AirportController extends Controller
{
    public function index()
    {
        return view('pilots.airport.index');
    }

    public function airport(Airport $airport)
    {
        return view('pilots.airport.airport', compact('airport'));
    }

    public function charts(Airport $airport)
    {
        $airport->loadCharts();
        return view('pilots.airport._partials.charts', compact('airport'))->render();
    }

    public function weather(Airport $airport)
    {
        $airport->loadWeather();
        return view('pilots.airport._partials.weather', compact('airport'))->render();
    }

}